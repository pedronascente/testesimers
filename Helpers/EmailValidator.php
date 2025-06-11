<?php

class EmailValidator
{
    /**
     * Verifica se o e-mail é válido.
     */
    public function isValid(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
}
