<?php

class DateFormatter
{
    /**
     * Formata uma data no formato d/m/Y.
     */
    public function toBrazilianFormat(?string $date): string
    {
        if (!empty($date)) {
            return date('d/m/Y', strtotime($date));
        }
        return 'Data não disponível';
    }

    /**
     * Verifica se uma string representa uma data válida.
     */
    public function isValidDate(?string $date): bool
    {
        if (!$date) return false;

        return strtotime($date) !== false;
    }
}