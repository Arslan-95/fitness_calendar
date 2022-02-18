<?php

add_action('init', 'fitness_work');

function fitness_work(){
  if(!isset($_POST['fitness-page'])){
    return;
  }

  if(isset($_POST['add_fitness_work'])){
    $works = get_option('fitness_works');
    $count = count($works);
    
    $works[$count] = [
      'date' => $_POST['date'],
      'time' => $_POST['time'],
      'number' => $_POST['number']
    ];

    var_dump($works);
    update_option('fitness_works', $works);   
  }
}