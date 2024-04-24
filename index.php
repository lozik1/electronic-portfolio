<?php
    include 'fonc.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
	  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/main.css">
    
    <title>Электронное портфолио</title>
  </head>
  <body>
  <h1>Портфолио</h1>
    <div class="container">
        <div class="row">
            <div class="col-12">
            <button class= "btn btn-success mt-2" data-bs-toggle="modal" data-bs-target="#create" ><i class='fa fa-plus'></i></button>
            <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#criteria">Добавить критерии</button>
            <table class="table table-striped table-hover mt-2">
            <thead class="thead-dark">
                <th>id</th>
                <th>sur_name</th>
                <th>name</th>
                <th>second_name</th>
                <th>Action</th>
            </thead>
            <tbody>
              <?php foreach ($result as $res){ ?>

                <tr data-id="<?php echo $res->id ?>" data-discipline="<?php echo $res->disciplines ?>" data-experience="<?php echo $res->experience ?>" data-education="<?php echo $res->education ?>">
                    <td><?php echo $res->id ?></td>
                    <td><?php echo $res->sur_name ?></td>
                    <td><?php echo $res->name ?></td>
                    <td><?php echo $res->second_name ?></td>
                    <td><a href="?id=<?php echo $res->id ?>" class="btn btn-success"data-bs-toggle="modal" data-bs-target="#edit<?php echo $res->id  ?>"><i class="fa fa-edit"></i></a>
                    <a href="" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?php echo $res->id  ?>"><i class="fa fa-trash-alt"></i></a></td>                
                </tr>
                <!--MODAL EDIT-->
                <div class="modal fade" id="edit<?php echo $res->id  ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Изменить учителя</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form action="?id=<?php echo $res->id  ?>" method="post">
                          <div class="form-group">
                            <small>Фамилия</small>
                            <input type="text" class="form-control"name = "sur_name" value = "<?php echo $res->sur_name ?>" >
                          </div>
                          <div class="form-group">
                            <small>Имя</small>
                            <input type="text" class="form-control"name = "name" value = "<?php echo $res->name ?>">
                          </div>
                          <div class="form-group">
                            <small>Отчество</small>
                            <input type="text" class="form-control"name = "second_name"value = "<?php echo $res->second_name ?>">
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Не изменять</button>
                        <button type="submit" class="btn btn-primary" name = "edit">Изменить</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!--modal edit-->
                <!--modal delet-->
                <div class="modal fade" id="delete<?php echo $res->id;  ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Удалить учителя №<?php echo $res->id; ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-footer">
                      <form action="?id=<?php echo $res->id  ?>" method="post">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Не удалять</button>
                        <button type="submit" class="btn btn-primary" name = "delete">Удалить</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <?php  }?>
            </tbody> 
          </table>
        </div>
    </div>
    </div>
    <!--MODAL delete-->
    <!-- Modal creat-->
    <div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role = "document">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Добавить пользователя</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action=" " method = 'post'>
                    <div class="form-group">
                    <small>Фамилия</small>
                        <input type="text" class="form-control" name = 'sur_name'>
                    </div>
                    <div class="form-group">
                        <small>Имя</small>
                        <input type="text" class="form-control" name = 'name'>
                    </div>
                    <div class="form-group">
                        <small>Отчество</small>
                        <input type="text" class="form-control" name = 'second_name'>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Не добавлять</button>
                    <button type="submit" class="btn btn-primary" name ="add" >Добавить</button>
                    </form>
                </div>
                </div>
            </div>
            </div>
            <!-- modal teacher_info -->
            <div class="modal" id="teacherInfoModal">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Информация о преподавателе</h5>
                          <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body" id="teacherInfoContent">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="modal fade" id="criteria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-scrollable">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Добавить критерии</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action=" " method = 'post'>
                    <div class="form-group">
                    <small>	Преподавание по программам углубленного, профильного изучения предмета, разработанной учителем авторской программе К1П1</small>
                        <input type="text" class="form-control" name = 'criterion1'>
                    </div>
                    <div class="form-group">
                        <small>	Участие педагога в инновационной деятельности по предмету, апробации новых методик, УМК (учитывается при условии обобшения данного опыта учителем через открытые уроки, мастер-классы, доклады, публикации по теме инновационной деятельности) К1П2</small>
                        <input type="text" class="form-control" name = 'criterion2'>
                    </div>
                    <div class="form-group">
                        <small>	Выполнение должностных обязанностей в части своевременного оформления и сдачи школьной документации К2П1</small>
                        <input type="text" class="form-control" name = 'criterion3'>
                    </div>
                    <div class="form-group">
                        <small>Доля обучающихся, преодолевших минимальный порог по результатам основного дня (от общего числа участвующих в ЕГЭ по данному предмету) К3П1	</small>
                        <input type="text" class="form-control" name = 'criterion4'>
                    </div>
                    <div class="form-group">
                        <small>	Доля учащихся (выпускников 9 классов данного учителя), подтвердивших по результатам ОГЭ годовые отметки по результатам основного дня К3П2</small>
                        <input type="text" class="form-control" name = 'criterion5'>
                    </div>
                    <div class="form-group">
                        <small>	Доля обучающихся, получивших положительные отметки (от общего числа выпускников 9-х классов данного педагога, участвующих в ОГЭ по предмету) по результатам основного дня К3П3</small>
                        <input type="text" class="form-control" name = 'criterion6'>
                    </div>
                    <div class="form-group">
                        <small>Динамика качества знаний в течение текущего учебного года К3П4</small>
                        <input type="text" class="form-control" name = 'criterion7'>
                    </div>
                    <div class="form-group">
                        <small>Доля обучающихся 2-8, 10-х классов у данного педагога, успешно (на 4 и 5) прошедших промежуточную аттестацию в независимой форме, включая НИКО, ВПР, РПР К3П5</small>
                        <input type="text" class="form-control" name = 'criterion8'>
                    </div>
                    <div class="form-group">
                        <small>	Результативность участия во Всероссийской предметной олимпиаде школьников К4П1</small>
                        <input type="text" class="form-control" name = 'criterion9'>
                    </div>
                    <div class="form-group">
                        <small>Результативность участия в заочных предметных чемпионатах, интеллектуальных марафонах (ЧИП, КИТ, Кенгуру, Медвежонок – языкознание, Золотое Руно, дистанционные олимпиады, конкурсы и т.п.) К4П2</small>
                        <input type="text" class="form-control" name = 'criterion10'>
                    </div>
                    <div class="form-group">
                        <small>	Количество призовых мест и лауреатов очных конкурсных мероприятий (конкурсы, гранты, фестивали, смотры знаний, предметные очные олимпиады) К4П3</small>
                        <input type="text" class="form-control" name = 'criterion11'>
                    </div>
                    <div class="form-group">
                        <small>	Результативность участия учащихся в научно-практических конференциях К4П4 Максимальный балл по данному показателю 15 б.</small>
                        <input type="text" class="form-control" name = 'criterion12'>
                    </div>
                    <div class="form-group">
                        <small>Количество призовых мест и лауреатов на мероприятиях художественно- эстетической направленности за исключением заочных и дистанционных (отчётные концерты, праздники искусства, утренники, выставки, ярмарки поделок, литературный праздник и др.) К4П5</small>
                        <input type="text" class="form-control" name = 'criterion13'>
                    </div>
                    <div class="form-group">
                        <small>	Результативность участия на мероприятиях военно-патриотической, экологической, туристическо-краеведческой направленности К4П6</small>
                        <input type="text" class="form-control" name = 'criterion14'>
                    </div>
                    <div class="form-group">
                        <small>	Результативность участия в спортивных состязаниях (для учителей физической культуры) К4П7</small>
                        <input type="text" class="form-control" name = 'criterion15'>
                    </div>
                    <div class="form-group">
                        <small>Доля обучающихся, сдавших тесты «ГТО» в полном объеме, от допущенных к сдаче, отнесённых к основной медицинской группе для занятий физической культурой и получивших значки (для учителей физической культуры) К4П8 Максимальный балл по данному показателю не более 20 б.</small>
                        <input type="text" class="form-control" name = 'criterion16'>
                    </div>
                    <div class="form-group">
                        <small>Результативность участия в очных мероприятиях по основам безопасности жизнедеятельности (для учителей ОБЖ, ОЗОЖ, физической культуры, начальных классов) К4П9</small>
                        <input type="text" class="form-control" name = 'criterion17'>
                    </div>
                    <div class="form-group">
                        <small>	Доля учащихся, принявших участие в конкурсе «Лучший ученик» («Лучшее ученическое портфолио») К5П1</small>
                        <input type="text" class="form-control" name = 'criterion18'>
                    </div>
                    <div class="form-group">
                        <small>	Участие в конкурсе «Лучший ученический класс» К5П2</small>
                        <input type="text" class="form-control" name = 'criterion19'>
                    </div>
                    <div class="form-group">
                        <small>Доля учащихся, зарегистрированных на официальном сайте волонтеров и внесенных в банк данных городского штаба волонтеров, имеющих волонтерские книжки ( учащиеся 14-ти лет и старше) К5П3</small>
                        <input type="text" class="form-control" name = 'criterion20'>
                    </div>
                    <div class="form-group">
                        <small>	Участие во внеклассных мероприятиях (интеллектуальных играх, конкурсах, спортивных мероприятиях) К5П4</small>
                        <input type="text" class="form-control" name = 'criterion21'>
                    </div>
                    <div class="form-group">
                        <small>Изменение доли учащихся в классе, совершивших правонарушения и стоящих на внутришкольном учете К5П5</small>
                        <input type="text" class="form-control" name = 'criterion22'>
                    </div>
                    <div class="form-group">
                        <small>Привлечение родителей к организации воспитательного процесса К5П6</small>
                        <input type="text" class="form-control" name = 'criterion23'>
                    </div>
                    <div class="form-group">
                        <small>	Доля учащихся класса, обеспеченных горячим питанием по месту учёбы К5П7</small>
                        <input type="text" class="form-control" name = 'criterion24'>
                    </div>
                    <div class="form-group">
                        <small>Ежегодное обобщение и распространение собственного педагогического опыта как учителя-предметника через публикации собственных методических и дидактических разработок, рекомендаций, учебных пособий (кроме сети интернет), открытые уроки, мастер-классы, внеурочные мероприятия, активное участие с докладами в конференциях, в том числе в режиме on-line (при наличии сертификата о выступлении), учитывается очное участие К6П1 Максимальный балл по данному показателю 20 б.</small>
                        <input type="text" class="form-control" name = 'criterion25'>
                    </div>
                    <div class="form-group">
                        <small>	Участие учителя в работе экспертных комиссий, групп, жюри олимпиад, творческих лабораторий, групп, предметных комиссий по проверке ГИА (учитывается очное участие) К6П2 Максимальный балл по данному показателю 15 б.</small>
                        <input type="text" class="form-control" name = 'criterion26'>
                    </div>
                    <div class="form-group">
                        <small>Наличие призовых мест в муниципальных , региональных, и всероссийских профессиональных конкурсах «Учитель года», «Лидер в образовании», «Учитель –учителю, «Фестиваль достижений молодых специалистов», конкурсе лучших учителей в рамках реализации ПНПО за отчетный период К6П3 (учитывается только очное участие)</small>
                        <input type="text" class="form-control" name = 'criterion27'>
                    </div>
                    <div class="form-group">
                        <small>Руководство индивидуальными итоговыми проектами обучающихся в 9-х классах</small>
                        <input type="text" class="form-control" name = 'criterion28'>
                    </div>
                    <div class="form-group">
                        <small>Презентация результатов исследовательской деятельности учителя в рамках профессиональных конкурсов, слётов К6П4 (учитывается заочное, очное участие) Максимальный балл по данному показателю 15 б.</small>
                        <input type="text" class="form-control" name = 'criterion29'>
                    </div>
                    <div class="form-group">
                        <small>Работа с молодыми специалистами (наставничество)</small>
                        <input type="text" class="form-control" name = 'criterion30'>
                    </div>
                    <div class="form-group">
                        <small>Педагог является членом (руководителем) школьной профсоюзной организации К7П1</small>
                        <input type="text" class="form-control" name = 'criterion31'>
                    </div>
                    <div class="form-group">
                        <small>Педагог является членом (руководителем) регионального отделения общественной организации «Педагогическое общество России» К7П2	</small>
                        <input type="text" class="form-control" name = 'criterion32'>
                    </div>
                    <div class="form-group">
                        <small>Педагог является членом (руководителем) управляющего совета, общественной организации, представляющей интересы профессионального педагогического сообщества К7П3</small>
                        <input type="text" class="form-control" name = 'criterion33'>
                    </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Не добавлять</button>
                          <button type="submit" class="btn btn-primary" name = "add_criteria">Добавить</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.1/js/bootstrap.min.js"></script>
<script>
  $(document).ready(function(){
  $("table").on("click", "td:not(:last-child)", function(){
    var $row = $(this).closest('tr');
    var id = $row.data('id');
    var disciplines = $row.data('discipline');
    var experience = $row.data('experience');
    var education = $row.data('education');

    // Формирование содержимого для модального окна
    var modalContent = "ID: " + id + "<br>Дисциплины: " + disciplines + "<br>Опыт работы : " + experience + "<br>Уровень образования: " + education;

    // Заполнение модального окна информацией
    $("#teacherInfoContent").html(modalContent);

    // Открытие модального окна с информацией
    $("#teacherInfoModal").modal("show");
  });
});
</script>
</body>
</html>
