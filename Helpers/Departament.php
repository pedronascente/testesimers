<?php

if (!function_exists('listaDepartamentos')) {
    
    function listaDepartamentos(): array
    {
        // Estático (padrão)
        return [
            'RH'  => 'Recursos Humanos',
            'TI'  => 'Tecnologia da Informação',
            'FIN' => 'Financeiro',
            'MKT' => 'Marketing',
            'ADM' => 'Administrativo'
        ];
    }
}
