<?php 

class Notification{
    public static $descrition = "Mensagem aqui!";
    public static $icon = "info";

    // public static function View(string $descrition,string $icon){
    //     $template = '
    //         <div class="notification" style="'.$brackground.'">
    //             <i class="icon-2" data-feather="'.$icon.'"></i>
    //             <p>'.
    //             $descrition
    //             .'
    //             </p>
    //             <a href="#" class="btn ghost-white p-1"><i data-feather="x"></i></a>
    //         </div>
    //     ';

    //     echo $template;
    // }

    public static function View(string $descrition,string $icon,string $bg = NULL){
        $brackground = $bg ? $bg : '';
        $template = '
            <div class="notification" style="background:var('.$brackground.');">
                <i class="icon-2" data-feather="'.$icon.'"></i>
                <p>'.
                $descrition
                .'
                </p>
                <a href="#" class="btn ghost-white p-1"><i data-feather="x"></i></a>
            </div>
        ';

        echo $template;
    }

}
    
?>