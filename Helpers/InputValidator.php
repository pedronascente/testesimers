<?php

class InputValidator
{
    /**
     * Sanitiza uma string de entrada (remove espaços, barras e converte HTML)
     */
    public function sanitize(string $data): string
    {
        return htmlspecialchars(stripslashes(trim($data)));
    }
}
