<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AgendamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('cliente.index');
    }

    public function dashboard()
    {
        $agendamentos = Agendamento::latest()->paginate(50);
        
        if (Auth::check()) {
            return view('admin.index', compact('agendamentos'));
        } 

        if (Auth::guest()) {
            return redirect()->route('home');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validado = Validator::make($request->all(), [
            'cliente' => ['required','filled','string','min:3','max:255'],
            'email' => ['required','filled','email:rfc', 'string'],
            'animal' => ['required', Rule::in(['cachorro', 'gato'])],
            'nome_animal' => ['required','filled','string','min:3','max:255'],
            'servico' => ['required', Rule::in(['consulta', 'vacinacao', 'banho', 'tosa'])],
            'data' => ['required','date','after_or_equal:today'],
            'observacoes' => ['nullable','string','max:1000']
        ], [
            'cliente.required'=> 'O campo nome completo é de preenchimento obrigatório.',
            'cliente.filled'=> 'O campo nome completo não pode ser vazio.',
            'cliente.string'=> 'O nome completo deve conter um texto válido.',
            'cliente.min'=> 'O nome completo deve conter no mínimo :min caracteres.',
            'cliente.max'=> 'O nome completo deve conter no máximo :max caracteres.',
            'email.required'=> 'O campo e-mail é de preenchimento obrigatório.',
            'email.email'=> 'O endereço de e-mail fornecido é inválido.',
            'email.filled'=> 'O campo e-mail não pode ser vazio.',
            'email.string'=> 'O email deve conter um texto válido.',
            'animal.required'=> 'Selecione qual é o seu pet.',
            'animal.in'=> 'A opção escolhida é inválida',
            'nome_animal.required'=> 'O campo nome do pet é de preenchimento obrigatório.',
            'nome_animal.string'=> 'O nome do pet deve conter um texto válido.',
            'nome_animal.min'=> 'O nome do pet deve conter no mínimo :min caracteres.',
            'nome_animal.max'=> 'O nome do pet deve conter no máximo :max caracteres.',
            'nome_animal.filled'=> 'O campo nome do pet não pode ser vazio.',
            'servico.required'=> 'Selecione um serviço.',
            'servico.in'=> 'A opção escolhida é inválida',
            'data.required'=> 'O campo data é de preenchimento obrigatório.',
            'data.date'=> 'A data fornecida é inválida',
            'data.after_or_equal' => 'A data do agendamento não pode ser uma data passada.',
            'observacoes.string'=> 'As observações devem conter um texto válido.',
            'observacoes.max'=> 'As observações devem conter no máximo :max caracteres.'
        ]);

        if ($validado->fails()) {
            return redirect()->back()->withErrors($validado)->withInput()->with('error', 'Algo deu errado!');
}

        Agendamento::create($request->all());

        return redirect()->route('home')->with('success', 'Enviado com sucesso!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agendamento $agendamento)
    {
        //
    }
}
