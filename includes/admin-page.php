<?php

add_action('admin_menu', 'register_fitness_calendar_page');

function register_fitness_calendar_page() {
  add_menu_page(
		'Fitness Calendar',
		'Fitness Calendar',
		'edit_others_posts',
    'fitness_calendar_page',
    'fitness_calendar_page_display'
	);
}

function fitness_calendar_page_display(){
  ?>
    <style>
      .form_add{
        display:flex;
        flex-direction:column;
        align-items: start;
      }
      .form_add > label{
        display: flex;
        align-items: center;
        margin-bottom: 5px;
      }
      .form_add > label strong{
        width: 120px;
      }
      
      .btn{
        border: none;
        background-color: #154BA0;
        color: #fff;
        padding: 6px 8px;
        border-radius: 5px;
        font-weight: 500;
        cursor: pointer;
      }
    </style>
    <h1><?php echo get_admin_page_title(); ?></h1>
    <form class="form_add" method="post" action="<?php the_permalink(); ?>">
      <label>
        <strong>Дата</strong>
        <input type="date" name="date">
      </label>
      <label>
        <strong>Начало занятий</strong>
        <input type="time" name="time">
      </label>
      <label>
        <strong>Количество мест</strong>
        <input type="number" name="number" placeholder="Количество мест">
      </label>
      <input type="hidden" name="add_fitness_work">
      <input type="hidden" name="fitness-page">
      <button type="submit" class="btn">Добавить</button>
    </form>

    <div class="works">
      <?php
        $works_list = get_option('fitness_works');
        
        foreach($works_list as $work){
          ?>
            <div class="work">
              <div class="work__date"><?php echo $work['date']; ?></div>
              <div class="work__time"><?php echo $work['time']; ?></div>
              <div class="work__number"><?php echo $work['number']; ?></div>
            </div>
          <?
        }
      ?>
    </div>
  <?php
}