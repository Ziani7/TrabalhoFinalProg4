<?php

class Presenca {
    private int $id_usuario;
    private int $id_atividade;
    private string $data;
    private string $hora;
    private bool $presenca;

    public function __construct(int $id_usuario, int $id_atividade, string $data, string $hora, bool $presenca) {
        $this->id_usuario = $id_usuario;
        $this->id_atividade = $id_atividade;
        $this->data = $data;
        $this->hora = $hora;
        $this->presenca = $presenca;
    }

    public function getIdUsuario(): int {
        return $this->id_usuario;
    }

    public function setIdUsuario(int $id_usuario): void {
        $this->id_usuario = $id_usuario;
    }

    public function getIdAtividade(): int {
        return $this->id_atividade;
    }

    public function setIdAtividade(int $id_atividade): void {
        $this->id_atividade = $id_atividade;
    }

    public function getData(): string {
        return $this->data;
    }

    public function setData(string $data): void {
        $this->data = $data;
    }

    public function getHora(): string {
        return $this->hora;
    }

    public function setHora(string $hora): void {
        $this->hora = $hora;
    }

    public function getPresenca(): bool {
        return $this->presenca;
    }

    public function setPresenca(bool $presenca): void {
        $this->presenca = $presenca;
    }
}
