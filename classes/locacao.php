<?php
class Locacao
{
    private $id;
    private $filme_id;
    private $cliente_id;
    private $data_locacao;
    private $data_devolucao;

    private $valor;
    public function __construct($id, $filme_id, $cliente_id, $data_locacao, $data_devolucao, $valor)
    {
        $this->id = $id;
        $this->filme_id = $filme_id;
        $this->cliente_id = $cliente_id;
        $this->data_locacao = $data_locacao;
        $this->data_devolucao = $data_devolucao;
        $this->valor = $valor;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getFilmeId()
    {
        return $this->filme_id;
    }

    public function getClienteId()
    {
        return $this->cliente_id;
    }

    public function getDataLocacao()
    {
        return $this->data_locacao;
    }

    public function getDataDevolucao()
    {
        return $this->data_devolucao;
    }

    public function getValor()
    {
        return $this->valor;
    }

    public function setDataDevolucao($data_devolucao)
    {
        $this->data_devolucao = $data_devolucao;
    }
    public function calcularValorLocacao($valor_diario)
    {
        $dias_locacao = $this->calcularDiasLocacao();
        return $valor_diario * $dias_locacao;
    }

    public function calcularDiasLocacao()
    {
        $data_locacao = new DateTime($this->data_locacao);
        $data_devolucao = new DateTime($this->data_devolucao);
        $intervalo = $data_locacao->diff($data_devolucao);
        return $intervalo->days;
    }


}


?>