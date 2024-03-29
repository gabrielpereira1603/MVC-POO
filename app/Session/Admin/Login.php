<?php

namespace app\Session\Admin;

class Login {

    /**
     * Metodo responsavel por iniciar a sessao
     */
    private static function init(){
        //VERIFICA SE A SESSAO NAO ESTA ATIVA
        if(session_status() != PHP_SESSION_ACTIVE){
            session_start();    
        }
    }
    /**
     * Metodo responsavel por criar o login do usuario
     * @param User
     * @return boolean
     */
    public static function login($obUser){
        //INICIA A SESSAO
        self::init();

        //DEFINE A SESSAO DO USUARIO
        $_SESSION['admin']['usuario'] = [
            'id' => $obUser->id,
            'nome'=> $obUser->nome,
            'email'=> $obUser->email
        ];

        //SUCESSO
        return true;
    }

    /**
     * Metodo reponsavel por verificar se o usuario esta logado
     * @return boolean 
     * */    
    public static function isLogged(){
        //INICIA A SESSAO
        self::init(); 

        //RETORNA A VERIFICACAO
        return isset($_SESSION['admin']['usuario']['id']);
    }

    /**
     * Metodo responsavel por executar logout do usuario
     * @return boolean
     */
    public static function logout(){
        //INICIA A SESSAO
        self::init();

        //DESLOGA O USUARIO
        unset($_SESSION['admin']['usuario']);
        
        //SUCESSO
        return true;
    }
}