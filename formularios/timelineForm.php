<?php
$timelineForm=array(
    'startdate'=>array(
        'label'=>'Start Date',
        'type'=>'date',
        'filters'=>array('striptags','striptrim'),
        'validation'=>array('required',
            'date',
            'error_message'=>'Error start date'
        ),    
    ),
    'enddate'=>array(
        'label'=>'End Date',
        'type'=>'date',
        'filters'=>array('striptags','striptrim'),
        'validation'=>array(
            'date',
            'error_message'=>'Error end date'
        ),    
    ),
    'headline'=>array(
        'label'=>'Headline',
        'type'=>'text',
        'filters'=>array('striptags','striptrim'),
        'validation'=>array('required',
            'maxsize'=>255,
            'minsize'=>3,
            'error_message'=>'Error aqui'
        ),    
    ),
    'text'=>array(
        'label'=>'Text',
        'type'=>'text',
        'filters'=>array('striptags','striptrim'),
        'validation'=>array(
            'maxsize'=>500,
            'minsize'=>3,
            'error_message'=>'Error aqui'
        ),
    ),
    'media'=>array(
        'label'=>'Media',
        'hint'=> 'can be a link to: youtube, vimeo, soundcloud, dailymotion, instagram, twit pic, twitter status, google plus status, wikipedia, or an image',
        'type'=>'text',
        'filters'=>array('striptags','striptrim'),
        'validation'=>array(
            'maxsize'=>500,
            'minsize'=>3,
            'error_message'=>'Error aqui'
        ),
    ),
    'mediacredit'=>array(
        'label'=>'Media Credit',
        'type'=>'text',
        'filters'=>array('striptags','striptrim'),
        'validation'=>array(
            'maxsize'=>500,
            'minsize'=>3,
            'error_message'=>'Error aqui'
        ),
    ),
    'mediacaption'=>array(
        'label'=>'Media Caption',
        'type'=>'text',
        'filters'=>array('striptags','striptrim'),
        'validation'=>array(
            'maxsize'=>500,
            'minsize'=>3,
            'error_message'=>'Error aqui'
        ),
    ),
    'mediathumbnail'=>array(
        'label'=>'Media Thumbnail',
        'hint'=>' Link to a image file. The image should be no larger than 32px x 32px.',
        'type'=>'text',
        'filters'=>array('striptags','striptrim'),
        'validation'=>array(
            'maxsize'=>500,
            'minsize'=>3,
            'error_message'=>'Error aqui'
        ),
    ),
    'type'=>array(
        'label'=>'Type',
        'hint'=>'This indicates which slide is the title slide. You can also set era slides but please note that era slides will only display headlines and dates (no media) ',
        'type'=>'radio',
        'options'=>array('None'=>'none','Title'=>'title','Era'=>'era'),
        'value'=>'none',
        'filters'=>array('striptags','striptrim'),        
    ),
    'tag'=>array(
        'label'=>'Tags',
        'hint'=>'Tags (Categories) You can have up to 6. If you define more than 6 some of them won\'t be displayed.',
        'type'=>'selectmultiple',
        'options'=>array('Cat1'=>'cat1','Cat2'=>'cat2','Cat3'=>'cat3'),
        'filters'=>array('striptags','striptrim'),
        'validation'=>array(
            'maxsize'=>500,
            'minsize'=>3,
            'error_message'=>'Error aqui'
        ),
    ),    
);
    