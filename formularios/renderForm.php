<?php

/**
 * Render form with validation data
 * 
 * @param array $form definition
 * @param array $validationData
 * @return string Form
 */
function renderForm($form, $validationData)
{
    $html='';
       
    foreach ($form as $key => $element)
    {
        echo "<pre>";
        print_r($element);
        echo "</pre>";
        
        switch($element['type'])
        {
            case 'hidden':
            case 'text':
                $html.='<li>
                        <label>'.$element['label'].'</label>';
                if(isset($validationData[$key]))
                    $html.='<span>'.$validationData[$key].'</span>';                        
                
                $html.='<input type="'.$element['type'].'" name="'.$key.'" ';
                if(isset($element['value']))
                    $html.='value="'.$element['value'].'"';
                $html.='/>
                    </li>';
            break;
            
        }
    }
    return $html;
}