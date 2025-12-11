<?php
defined('ABSPATH') || exit;
?>

<!DOCTYPE html>
<html>

<?php
get_template_part('template-parts/head');
?>

<body>
    <?php get_header() ?>
    <main class="page-uslugi">

    <section class="breadcrumbs" aria-label="Навигация — хлебные крошки">
        <nav aria-label="breadcrumb">
            <?php woocommerce_breadcrumb(); ?>
        </nav>
    </section>

    <section class="uslugi">
        <div class="uslugi__wrapper">
            <div class="uslugi__header">
                <div class="uslugi__title">
                    <h1>
                        Калькулятор
                    </h1>
                </div>
            </div>
            
            <div class="caclulator_box" style="margin: auto !important;">
                <div class="tabs_box calc_menu active_tab">
                    <div class="col-md-4 left_calc">
                        <div class="choice_calc">
                            <div id="weigth_calc" hidden class="weigth_calc_choice">Расчет веса</div>
                            <div id="length_calc" class="length_calc_choice active_c">Расчет длины</div>
                        </div>
                        <div class="typingText">Категории товара</div>
                        <div class="cat_metal">
                            <label id="circleid" class="cat_steel add_cat_steel" title="Круг проволока катанка">
                                <input class="hidenShow" type="radio" id="checked1" name="prokat" value="prokat1" onclick="showDivCircle('prokat1')" checked="">
                                Круг/Пруток
                            </label>
                            <label id="squre" class="cat_steel" title="Квадрат">
                                <input class="hidenShow" type="radio" id="checked2" name="prokat" value="prokat2" onclick="showDivCircle('prokat2')">
                                Квадрат
                            </label>
                            <label id="hexahedron" class="cat_steel" title="Шестигранник">
                                <input class="hidenShow" type="radio" id="checked3" name="prokat" value="prokat3" onclick="showDivCircle('prokat3')">
                                Шестигранник
                            </label>
                            <label id="corner" class="cat_steel" title="Уголок">
                                <input class="hidenShow" type="radio" id="checked4" name="prokat" value="prokat4" onclick="showDivCircle('prokat4')">
                                Уголок
                            </label>
                            <label id="ribbon" class="cat_steel" title="Лента">
                                <input class="hidenShow" type="radio" id="checked5" name="prokat" value="prokat5" onclick="showDivCircle('prokat5')">
                                Лента
                            </label>
                            <label id="beam" class="cat_steel" title="Балка/Двутавр">
                                <input class="hidenShow" type="radio" id="checked6" name="prokat" value="prokat6" onclick="showDivCircle('prokat6')">
                                Балка/Двутавр
                            </label>
                            <label id="pipe" class="cat_steel" title="Труба">
                                <input class="hidenShow" type="radio" id="checked7" name="prokat" value="prokat7" onclick="showDivCircle('prokat7')">
                                Труба
                            </label>
                            <label id="plate" class="cat_steel" title="Лист/Плита">
                                <input class="hidenShow" type="radio" id="checked8" name="prokat" value="prokat8" onclick="showDivCircle('prokat8')">
                                Лист/Плита
                            </label>
                            <label id="channel" class="cat_steel" title="Швеллер">
                                <input class="hidenShow" type="radio" id="checked9" name="prokat" value="prokat9" onclick="showDivCircle('prokat9')">
                                Швеллер
                            </label>
                            <label id="profile_pipe" class="cat_steel" title="Труба профильная">
                                <input class="hidenShow" type="radio" id="checked10" name="prokat" value="prokat10" onclick="showDivCircle('prokat10')">
                                Труба профильная
                            </label>
                        </div>
                    </div>
                    <div class="col-md-8 rigth_calc">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="typeMetall">
                                        <label for="materialType">Тип металла:</label>
                                        <select class="type_steel" id="materialType">
                                            <option value="1" selected="">Сталь</option>
                                            <option value="2">Чугун</option>
                                            <option value="3">Алюминий</option>
                                            <option value="4">Бронза</option>
                                            <option value="5">Латунь</option>
                                            <option value="6">Нержавейка</option>
                                            <option value="7">Медь</option>
                                            <option value="8">Титан</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="steelGrade">
                                        <label for="steelType">Марка стали:</label>
                                        <select id="steelType" style="display: none;">
                                            <option value="st3">Ст3</option>
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="40x">40X</option>
                                            <option value="45">45</option>
                                            <option value="65">65</option>
                                            <option value="65Г">65Г</option>
                                            <option value="09Г2С">09Г2С</option>
                                            <option value="15Х5М">15Х5М</option>
                                            <option value="10ХСНД">10ХСНД</option>
                                            <option value="12Х1МФ">12Х1МФ</option>
                                            <option value="ШХ15">ШХ15</option>
                                            <option value="Р6М5">Р6М5</option>
                                            <option value="У7">У7</option>
                                            <option value="У8">У8</option>
                                            <option value="У8А">У8А</option>
                                            <option value="У10">У10</option>
                                            <option value="У10А">У10А</option>
                                            <option value="У12А">У12А</option>
                                        </select>
                                        <select id="castIron" style="display: none;">
                                            <option value="sch10">СЧ10</option>
                                            <option value="sch15">СЧ15</option>
                                            <option value="sch20">СЧ20</option>
                                            <option value="sch25">СЧ25</option>
                                            <option value="sch35">СЧ35</option>
                                        </select>
                                        <select id="aluminum" style="display: none;">
                                            <option value="А5">А5</option>
                                            <option value="АД">АД</option>
                                            <option value="АД1">АД1</option>
                                            <option value="АК4">АК4</option>
                                            <option value="АК6">АК6</option>
                                            <option value="АМг">АМг</option>
                                            <option value="АМц">АМц</option>
                                            <option value="В95">В95</option>
                                            <option value="Д1">Д1</option>
                                            <option value="Д16">Д16</option>
                                        </select>
                                        <select id="bronze" style="display: none;">
                                            <option value="БрАЖ9-4">БрАЖ9-4</option>
                                            <option value="БрАЖМЦ10-3-1,5">БрАЖМЦ10-3-1,5</option>
                                            <option value="БрАЖМЦ10-4-4">БрАЖМЦ10-4-4</option>
                                            <option value="БрАМЦ9-2">БрАМЦ9-2</option>
                                            <option value="БрБ2">БрБ2</option>
                                            <option value="БрКМЦ3-1">БрКМЦ3-1</option>
                                            <option value="БрОФ7-0,2">БрОФ7-0,2</option>
                                            <option value="БрОЦС5-5-5">БрОЦС5-5-5</option>
                                        </select>
                                        <select id="brass" style="display: none;">
                                            <option value="Л63">Л63</option>
                                            <option value="Л68">Л68</option>
                                            <option value="ЛЖМц59-1-1">ЛЖМц59-1-1</option>
                                            <option value="ЛЖМц58-2">ЛЖМц58-2</option>
                                            <option value="ЛС58-2">ЛС58-2</option>
                                            <option value="ЛС59-1">ЛС59-1</option>
                                            <option value="ЛС63-3">ЛС63-3</option>
                                        </select>
                                        <select id="stainlessSteel" style="display: block;">
                                            <option value="08Х17Т">08Х17Т</option>
                                            <option value="20Х13">20Х13</option>
                                            <option value="30Х13">30Х13</option>
                                            <option value="40Х13">40Х13</option>
                                            <option value="08Х18Н10">08Х18Н10</option>
                                            <option value="12Х18Н10">12Х18Н10</option>
                                            <option value="10Х17Н13М2Т">10Х17Н13М2Т</option>
                                            <option value="06ХН28МДТ">06ХН28МДТ</option>
                                            <option value="20Х23Н18">20Х23Н18</option>
                                            <option value="AISI304">AISI 304</option>
                                            <option value="AISI316L">AISI 316L</option>
                                            <option value="AISI316Ti">AISI 316Ti</option>
                                            <option value="AISI321">AISI 321</option>
                                            <option value="AISI409">AISI 409</option>
                                            <option value="AISI430">AISI 430</option>
                                            <option value="AISI904L">AISI 904L</option>
                                        </select>
                                        <select id="copper" style="display: none;">
                                            <option value="М1">М1</option>
                                            <option value="М2">М2</option>
                                            <option value="М3">М3</option>
                                        </select>
                                        <select id="titanium" style="display: none;">
                                            <option value="ВТ1-00">ВТ1-00</option>
                                            <option value="ВТ1-1">ВТ1-1</option>
                                            <option value="АТ-6">АТ-6</option>
                                            <option value="ВТ14">ВТ14</option>
                                            <option value="ВТ20">ВТ20</option>
                                            <option value="ВТ22">ВТ22</option>
                                            <option value="ВТ3-1">ВТ3-1</option>
                                            <option value="ВТ5">ВТ5</option>
                                            <option value="ВТ5-1">ВТ5-1</option>
                                            <option value="ВТ6">ВТ6</option>
                                            <option value="ОТ4-1">ОТ4-1</option>
                                            <option value="ПТ7М">ПТ7М</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="prokat" class="cont_rigt">
                                <div class="cont_rigt_left">
                                    <div class="subtitleBox">
                                        <span class="subtitle">Расчет</span>
                                        <span id="subtitle" class="subtitle"> длины</span>
                                        <span id="subtitle2" class="subtitle"> круга</span>:
                                    </div>
                                    <div class="img_type">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/calc/круг.png" alt="">
                                    </div>
                                </div>
                                <div class="row prokat1" id="divprokat1" style="display: flex;">
                                    <!-- <div class="col-md-7 drawCol">
                                        
                                    </div> -->
                                    <div class="col-md-5">
                                        <div class="gr_st">
                                            <label class="diamInput" for="diameter">(D) Диаметр (мм):</label>
                                            <input type="text" id="diameter" placeholder="0">
                                        </div>
                                    </div>
                                </div>
                                <div class="row prokat1" id="divprokat2" style="display:none;">
                                    <div class="col-md-7 drawCol">
                                        <div class="img_type2"></div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="gr_st">
                                            <label class="diamInput" for="withIn">(a) Ширина (мм):</label>
                                            <input type="text" id="withIn" placeholder="0">
                                        </div>
                                    </div>
                                </div>
                                <div class="row prokat1" id="divprokat3" style="display:none;">
                                    <div class="col-md-7 drawCol">
                                        <div class="img_type3"></div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="gr_st">
                                            <label class="diamInput" for="hexahedronInp">(a) Диаметр (мм):</label>
                                            <input type="text" id="hexahedronInp" placeholder="0">
                                        </div>
                                    </div>
                                </div>
                                <div class="row prokat1" id="divprokat4" style="display:none;">
                                    <div class="col-md-7 drawCol">
                                        <div class="img_type4"></div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="gr_st">
                                            <label class="diamInput" for="cornerWidth">(a) Ширина (мм):</label>
                                            <input type="text" id="cornerWidth" placeholder="0">
                                        </div>
                                        <div class="gr_st">
                                            <label class="diamInput" for="cornerHeigth">(b) Высота (мм):</label>
                                            <input type="text" id="cornerHeigth" placeholder="0">
                                        </div>
                                        <div class="gr_st">
                                            <label class="diamInput" for="cornerThickness">(t) Толщина стенки (мм):</label>
                                            <input type="text" id="cornerThickness" placeholder="0">
                                        </div>
                                    </div>
                                </div>
                                <div class="row prokat1" id="divprokat5" style="display:none;">
                                    <div class="col-md-7 drawCol">
                                        <div class="img_type5"></div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="gr_st">
                                            <label class="diamInput" for="ribbonWidth">(a) Ширина ленты (мм):</label>
                                            <input type="text" id="ribbonWidth" placeholder="0">
                                        </div>
                                        <div class="gr_st">
                                            <label class="diamInput" for="ribbonHeigth">Толщина ленты (мм):</label>
                                            <input type="text" id="ribbonHeigth" placeholder="0">
                                        </div>
                                        <div class="gr_st grarea">
                                            <div class="weight_calc">Площадь</div>
                                            <div id="area">0</div>
                                            <div class="kg_calc">м2</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row prokat1" id="divprokat6" style="display:none;">
                                    <div class="col-md-7 drawCol">
                                        <div class="img_type6"></div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="gr_st">
                                            <label class="diamInput" for="beamHeigth">(h) Высота балки (мм):</label>
                                            <input type="text" id="beamHeigth" placeholder="0">
                                        </div>
                                        <div class="gr_st">
                                            <label class="diamInput" for="beamWidth">(b) Ширина балки (мм):</label>
                                            <input type="text" id="beamWidth" placeholder="0">
                                        </div>
                                        <div class="gr_st">
                                            <label class="diamInput" for="lintelLintThick">(s) Толщина перемычки (мм):</label>
                                            <input type="text" id="lintelLintThick" placeholder="0">
                                        </div>
                                        <div class="gr_st">
                                            <label class="diamInput" for="beamShelfThick">(t) Толщина полок (мм):</label>
                                            <input type="text" id="beamShelfThick" placeholder="0">
                                        </div>
                                    </div>
                                </div>
                                <div class="row prokat1" id="divprokat7" style="display:none;">
                                    <div class="col-md-7 drawCol">
                                        <div class="img_type7"></div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="gr_st">
                                            <label class="diamInput" for="pipeDiam">(D) Диаметр (мм):</label>
                                            <input type="text" id="pipeDiam" placeholder="0">
                                        </div>
                                        <div class="gr_st">
                                            <label class="diamInput" for="pipeThickness">(t) Толщина стенки (мм):</label>
                                            <input type="text" id="pipeThickness" placeholder="0">
                                        </div>
                                    </div>
                                </div>
                                <div class="row prokat1" id="divprokat8" style="display:none;">
                                    <div class="col-md-7 drawCol">
                                        <div class="img_type8"></div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="gr_st">
                                            <label class="diamInput" for="plateThickness">(t) Толщина листа (мм):</label>
                                            <input type="text" id="plateThickness" placeholder="0">
                                        </div>
                                        <div class="gr_st">
                                            <label class="diamInput" for="plateWidth">(a) Ширина листа (мм):</label>
                                            <input type="text" id="plateWidth" placeholder="0">
                                        </div>
                                        <div class="gr_st">
                                            <label class="diamInput" for="plateNumber">Количество (шт):</label>
                                            <input type="text" id="plateNumber" placeholder="0">
                                        </div>
                                        <div class="gr_st grarea">
                                            <div class="weight_calc">Площадь</div>
                                            <div id="area2">0</div>
                                            <div class="kg_calc">м<sup>2</sup></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row prokat1" id="divprokat9" style="display:none;">
                                    <div class="col-md-7 drawCol">
                                        <div class="img_type9"></div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="gr_st">
                                            <label class="diamInput" for="channelHeigth">(h) Высота (мм):</label>
                                            <input type="text" id="channelHeigth" placeholder="0">
                                        </div>
                                        <div class="gr_st">
                                            <label class="diamInput" for="channelWidth">(b) Ширина (мм):</label>
                                            <input type="text" id="channelWidth" placeholder="0">
                                        </div>
                                        <div class="gr_st">
                                            <label class="diamInput" for="channelThicknessShelf">(t) Толщина полки (мм):</label>
                                            <input type="text" id="channelThicknessShelf" placeholder="0">
                                        </div>
                                        <div class="gr_st">
                                            <label class="diamInput" for="channelThickness">(s) Толщина стенки (мм):</label>
                                            <input type="text" id="channelThickness" placeholder="0">
                                        </div>
                                    </div>
                                </div>
                                <div class="row prokat1" id="divprokat10" style="display:none;">
                                    <div class="col-md-7 drawCol">
                                        <div class="img_type10"></div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="gr_st">
                                            <label class="diamInput" for="profilePipeWidth">(a) Ширина трубы (мм):</label>
                                            <input type="text" id="profilePipeWidth" placeholder="0">
                                        </div>
                                        <div class="gr_st">
                                            <label class="diamInput" for="profilePipeHeigth">(b) Высота трубы (мм):</label>
                                            <input type="text" id="profilePipeHeigth" placeholder="0">
                                        </div>
                                        <div class="gr_st">
                                            <label class="diamInput" for="profilePipeThickness">(t) Толщина стенки (мм):</label>
                                            <input type="text" id="profilePipeThickness" placeholder="0">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container lineLength"> </div>
                        <div class="container forLinkSt">
                            <div class="row">
                                <div class="col-md-7 left_rescol">
                                    <div class="lengthSteel lenmain" id="lenmain">
                                        <label class="Forlength" for="length">(L) Длина (м):</label>
                                        <input type="text" id="length" placeholder="0">
                                    </div>
                                    <div class="lengthSteelPlate lenPlate lenmain" id="lenmainPlate">
                                        <label class="Forlength" for="lengthPlate">(b) Длина (мм):</label>
                                        <input type="text" id="lengthPlate" placeholder="0">
                                    </div>
                                    <div class="lengthSteel" id="weightTogle">
                                        <label class="Forlength" for="weightCount">Вес (кг):</label>
                                        <input type="text" id="weightCount" placeholder="0">
                                    </div>
                                    <div class="PriceSteel">
                                        <label class="ForPrice" for="Price">Цена (руб/кг):</label>
                                        <input type="text" id="Price" placeholder="0">
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-7"></div>
                                <div class="col-md-5 bottom_rescol">
                                    <div class="btn_res">
                                        <button id="calculate" class="lenmain">Рассчитать</button>
                                        <button id="calculate2" class="button button--red">Рассчитать</button>
                                    </div>
                                </div>
                                <div class="col-md-5 right_rescol">
                                    <span>Результат:</span>
                                    <div class="result_box lenmain" id="resultBox">
                                        <div class="weight_calc">Вес</div>
                                        <div id="result">0.00</div>
                                        <div class="kg_calc">кг.</div>
                                    </div>
                                    <div class="result_box" id="resultLengthBox">
                                        <div class="weight_calc">Длина</div>
                                        <div id="resultLength">0.000</div>
                                        <div class="kg_calc">м.</div>
                                    </div>
                                    <div class="result_boxPrice">
                                        <div class="weight_calc">Стоимость</div>
                                        <div id="resultWeigth">0.00</div>
                                        <div class="kg_calc">руб.</div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
        
        <?php 
            // get_template_part(
            //     'template-parts/consult', 
            //     '',
            //     array(
            //         'title' => 'Остались вопросы? Напишите нам!',
            //         'image' => get_template_directory_uri().'/assets/img/consult.webp',
            //     )
            // );
        ?>
    </main>
    <?php get_footer() ?>
    <?php wp_footer() ?>
    <script>
        // hide weight block if checked count length
        function checkForActiveC() {
            var weigthCalc = document.getElementById("weigth_calc");
            var lengthCalc = document.getElementById("length_calc");
            var subtitle = document.getElementById("subtitle");

            if (weigthCalc.classList.contains("active_c")) {
                weigthCalc.classList.add("active_c");
                lengthCalc.classList.remove("active_c");
                weightTogle.classList.add("lenmain");
                resultBox.classList.remove("lenmain");
                resultLengthBox.classList.add("lenmain");
                subtitle.innerHTML = "веса";
            }

            if (lengthCalc.classList.contains("active_c")) {
                weigthCalc.classList.remove("active_c");
                lengthCalc.classList.add("active_c");
                weightTogle.classList.remove("lenmain");
                resultBox.classList.add("lenmain");
                resultLengthBox.classList.remove("lenmain");
                subtitle.innerHTML = "длины";
            }
        }
        
        // Автоматически активируем вкладку "Расчет длины" при загрузке
        document.addEventListener('DOMContentLoaded', function() {
            var lengthCalc = document.getElementById("length_calc");
            if (lengthCalc) {
                // Программно кликаем на кнопку "Расчет длины"
                lengthCalc.click();
            }
        });
    </script>
    <script>
        //others
        var subtitle = document.getElementById("subtitle");
        var subtitle2 = document.getElementById("subtitle2");

        var steelType = document.getElementById("steelType");
        var castIron = document.getElementById("castIron");
        var aluminum = document.getElementById("aluminum");
        var bronze = document.getElementById("bronze");
        var brass = document.getElementById("brass");
        var stainlessSteel = document.getElementById("stainlessSteel");
        var copper = document.getElementById("copper");
        var titanium = document.getElementById("titanium");

        var circleid = document.getElementById("circleid");
        var squre = document.getElementById("squre");
        var hexahedron = document.getElementById("hexahedron");
        var corner = document.getElementById("corner");
        var ribbon = document.getElementById("ribbon");
        var beam = document.getElementById("beam");
        var pipe = document.getElementById("pipe");
        var plate = document.getElementById("plate");
        var channel = document.getElementById("channel");
        var profile_pipe = document.getElementById("profile_pipe");

        var customDiv = document.getElementById("divprokat1");
        var customDiv2 = document.getElementById("divprokat2");
        var customDiv3 = document.getElementById("divprokat3");
        var customDiv4 = document.getElementById("divprokat4");
        var customDiv5 = document.getElementById("divprokat5");
        var customDiv6 = document.getElementById("divprokat6");
        var customDiv7 = document.getElementById("divprokat7");
        var customDiv8 = document.getElementById("divprokat8");
        var customDiv9 = document.getElementById("divprokat9");
        var customDiv10 = document.getElementById("divprokat10");
        var InptValue = document.getElementById("checked1");
        var InptValue2 = document.getElementById("checked2");
        var InptValue3 = document.getElementById("checked3");
        var InptValue4 = document.getElementById("checked4");
        var InptValue5 = document.getElementById("checked5");
        var InptValue6 = document.getElementById("checked6");
        var InptValue7 = document.getElementById("checked7");
        var InptValue8 = document.getElementById("checked8");
        var InptValue9 = document.getElementById("checked9");
        var InptValue10 = document.getElementById("checked10");

        if (InptValue.checked) {
            customDiv.style.display = "flex";
            circleid.classList.add("add_cat_steel");
            subtitle2.innerHTML = " круга"
        }
        if (InptValue2.checked) {
            customDiv2.style.display = "flex";
            squre.classList.add("add_cat_steel");
            subtitle2.innerHTML = " квадрата";
        }
        if (InptValue3.checked) {
            customDiv3.style.display = "flex";
            hexahedron.classList.add("add_cat_steel");
            subtitle2.innerHTML = " шестигранника";
        }
        if (InptValue4.checked) {
            customDiv4.style.display = "flex";
            corner.classList.add("add_cat_steel");
            subtitle2.innerHTML = " уголка";
        }
        if (InptValue5.checked) {
            customDiv5.style.display = "flex";
            ribbon.classList.add("add_cat_steel");
            subtitle2.innerHTML = " ленты";
        }
        if (InptValue6.checked) {
            customDiv6.style.display = "flex";
            beam.classList.add("add_cat_steel");
            subtitle2.innerHTML = " балки";
        }
        if (InptValue7.checked) {
            customDiv7.style.display = "flex";
            pipe.classList.add("add_cat_steel");
            subtitle2.innerHTML = " трубы";
        }
        if (InptValue8.checked) {
            customDiv8.style.display = "flex";
            plate.classList.add("add_cat_steel");
            subtitle2.innerHTML = " листа";
        }
        if (InptValue9.checked) {
            customDiv9.style.display = "flex";
            channel.classList.add("add_cat_steel");
            subtitle2.innerHTML = " швеллера";
        }
        if (InptValue10.checked) {
            customDiv10.style.display = "flex";
            profile_pipe.classList.add("add_cat_steel");
            subtitle2.innerHTML = " профильной трубы";
        }

        function showDivCircle(inputValue) {

            const imageMap = {
                'prokat1': 'круг.png',
                'prokat2': 'квадрат.png',
                'prokat3': 'шестигранник.png',
                'prokat4': 'уголок.png',
                'prokat5': 'лента.png',
                'prokat6': 'балка.png',
                'prokat7': 'труба.png',
                'prokat8': 'лист.png',
                'prokat9': 'швеллер.png',
                'prokat10': 'профиль.png'
            };

            const imgElement = document.querySelector('.img_type img');
            if (imgElement && imageMap[inputValue]) {
                imgElement.src = '<?php echo get_template_directory_uri(); ?>/assets/img/calc/' + imageMap[inputValue];
                
                // Обновляем alt текст
                const altTexts = {
                    'prokat1': 'Круглый профиль',
                    'prokat2': 'Квадратный профиль',
                    'prokat3': 'Шестигранный профиль',
                    'prokat4': 'Уголок',
                    'prokat5': 'Стальная лента',
                    'prokat6': 'Двутавровая балка',
                    'prokat7': 'Труба',
                    'prokat8': 'Лист металла',
                    'prokat9': 'Швеллер',
                    'prokat10': 'Профильная труба'
                };
                imgElement.alt = altTexts[inputValue] || 'Изображение профиля';
            }

            var div1 = document.getElementById("divprokat1");
            var div2 = document.getElementById("divprokat2");
            var div3 = document.getElementById("divprokat3");
            var div4 = document.getElementById("divprokat4");
            var div5 = document.getElementById("divprokat5");
            var div6 = document.getElementById("divprokat6");
            var div7 = document.getElementById("divprokat7");
            var div8 = document.getElementById("divprokat8");
            var div9 = document.getElementById("divprokat9");
            var div10 = document.getElementById("divprokat10");

            

            if (inputValue === "prokat1") {
                div1.style.display = "flex";
                div2.style.display = "none";
                div3.style.display = "none";
                div4.style.display = "none";
                div5.style.display = "none";
                div6.style.display = "none";
                div7.style.display = "none";
                div8.style.display = "none";
                div9.style.display = "none";
                div10.style.display = "none";
                circleid.classList.add("add_cat_steel");
                squre.classList.remove("add_cat_steel");
                hexahedron.classList.remove("add_cat_steel");
                corner.classList.remove("add_cat_steel");
                ribbon.classList.remove("add_cat_steel");
                beam.classList.remove("add_cat_steel");
                pipe.classList.remove("add_cat_steel");
                plate.classList.remove("add_cat_steel");
                channel.classList.remove("add_cat_steel");
                profile_pipe.classList.remove("add_cat_steel");
                subtitle2.innerHTML = " круга";
                checkForActiveC();
            } else if (inputValue === "prokat2") {
                div1.style.display = "none";
                div2.style.display = "flex";
                div3.style.display = "none";
                div4.style.display = "none";
                div5.style.display = "none";
                div6.style.display = "none";
                div7.style.display = "none";
                div8.style.display = "none";
                div9.style.display = "none";
                div10.style.display = "none";
                squre.classList.add("add_cat_steel");
                circleid.classList.remove("add_cat_steel");
                hexahedron.classList.remove("add_cat_steel");
                corner.classList.remove("add_cat_steel");
                ribbon.classList.remove("add_cat_steel");
                beam.classList.remove("add_cat_steel");
                pipe.classList.remove("add_cat_steel");
                plate.classList.remove("add_cat_steel");
                channel.classList.remove("add_cat_steel");
                profile_pipe.classList.remove("add_cat_steel");
                subtitle2.innerHTML = " квадрата";
                checkForActiveC();
            } else if (inputValue === "prokat3") {
                div1.style.display = "none";
                div2.style.display = "none";
                div3.style.display = "flex";
                div4.style.display = "none";
                div5.style.display = "none";
                div6.style.display = "none";
                div7.style.display = "none";
                div8.style.display = "none";
                div9.style.display = "none";
                div10.style.display = "none";
                hexahedron.classList.add("add_cat_steel");
                squre.classList.remove("add_cat_steel");
                circleid.classList.remove("add_cat_steel");
                corner.classList.remove("add_cat_steel");
                ribbon.classList.remove("add_cat_steel");
                beam.classList.remove("add_cat_steel");
                pipe.classList.remove("add_cat_steel");
                plate.classList.remove("add_cat_steel");
                channel.classList.remove("add_cat_steel");
                profile_pipe.classList.remove("add_cat_steel");
                subtitle2.innerHTML = " шестигранника";
                checkForActiveC();
            } else if (inputValue === "prokat4") {
                div1.style.display = "none";
                div2.style.display = "none";
                div3.style.display = "none";
                div4.style.display = "flex";
                div5.style.display = "none";
                div6.style.display = "none";
                div7.style.display = "none";
                div8.style.display = "none";
                div9.style.display = "none";
                div10.style.display = "none";
                circleid.classList.remove("add_cat_steel");
                squre.classList.remove("add_cat_steel");
                hexahedron.classList.remove("add_cat_steel");
                corner.classList.add("add_cat_steel");
                ribbon.classList.remove("add_cat_steel");
                beam.classList.remove("add_cat_steel");
                pipe.classList.remove("add_cat_steel");
                plate.classList.remove("add_cat_steel");
                channel.classList.remove("add_cat_steel");
                profile_pipe.classList.remove("add_cat_steel");
                subtitle2.innerHTML = " уголка";
                checkForActiveC();
            } else if (inputValue === "prokat5") {
                div1.style.display = "none";
                div2.style.display = "none";
                div3.style.display = "none";
                div4.style.display = "none";
                div5.style.display = "flex";
                div6.style.display = "none";
                div7.style.display = "none";
                div8.style.display = "none";
                div9.style.display = "none";
                div10.style.display = "none";
                circleid.classList.remove("add_cat_steel");
                squre.classList.remove("add_cat_steel");
                hexahedron.classList.remove("add_cat_steel");
                corner.classList.remove("add_cat_steel");
                ribbon.classList.add("add_cat_steel");
                beam.classList.remove("add_cat_steel");
                pipe.classList.remove("add_cat_steel");
                plate.classList.remove("add_cat_steel");
                channel.classList.remove("add_cat_steel");
                profile_pipe.classList.remove("add_cat_steel");
                subtitle2.innerHTML = " ленты";
                checkForActiveC();
            } else if (inputValue === "prokat6") {
                div1.style.display = "none";
                div2.style.display = "none";
                div3.style.display = "none";
                div4.style.display = "none";
                div5.style.display = "none";
                div6.style.display = "flex";
                div7.style.display = "none";
                div8.style.display = "none";
                div9.style.display = "none";
                div10.style.display = "none";
                circleid.classList.remove("add_cat_steel");
                squre.classList.remove("add_cat_steel");
                hexahedron.classList.remove("add_cat_steel");
                corner.classList.remove("add_cat_steel");
                ribbon.classList.remove("add_cat_steel");
                beam.classList.add("add_cat_steel");
                pipe.classList.remove("add_cat_steel");
                plate.classList.remove("add_cat_steel");
                channel.classList.remove("add_cat_steel");
                profile_pipe.classList.remove("add_cat_steel");
                subtitle2.innerHTML = " балки";
                checkForActiveC();
            } else if (inputValue === "prokat7") {
                div1.style.display = "none";
                div2.style.display = "none";
                div3.style.display = "none";
                div4.style.display = "none";
                div5.style.display = "none";
                div6.style.display = "none";
                div7.style.display = "flex";
                div8.style.display = "none";
                div9.style.display = "none";
                div10.style.display = "none";
                circleid.classList.remove("add_cat_steel");
                squre.classList.remove("add_cat_steel");
                hexahedron.classList.remove("add_cat_steel");
                corner.classList.remove("add_cat_steel");
                ribbon.classList.remove("add_cat_steel");
                beam.classList.remove("add_cat_steel");
                pipe.classList.add("add_cat_steel");
                plate.classList.remove("add_cat_steel");
                channel.classList.remove("add_cat_steel");
                profile_pipe.classList.remove("add_cat_steel");
                subtitle2.innerHTML = " трубы";
                checkForActiveC();
            } else if (inputValue === "prokat8") {
                div1.style.display = "none";
                div2.style.display = "none";
                div3.style.display = "none";
                div4.style.display = "none";
                div5.style.display = "none";
                div6.style.display = "none";
                div7.style.display = "none";
                div8.style.display = "flex";
                div9.style.display = "none";
                div10.style.display = "none";
                circleid.classList.remove("add_cat_steel");
                squre.classList.remove("add_cat_steel");
                hexahedron.classList.remove("add_cat_steel");
                corner.classList.remove("add_cat_steel");
                ribbon.classList.remove("add_cat_steel");
                beam.classList.remove("add_cat_steel");
                pipe.classList.remove("add_cat_steel");
                plate.classList.add("add_cat_steel");
                channel.classList.remove("add_cat_steel");
                profile_pipe.classList.remove("add_cat_steel");
                subtitle2.innerHTML = " листа";
                checkForActiveC();
            } else if (inputValue === "prokat9") {
                div1.style.display = "none";
                div2.style.display = "none";
                div3.style.display = "none";
                div4.style.display = "none";
                div5.style.display = "none";
                div6.style.display = "none";
                div7.style.display = "none";
                div8.style.display = "none";
                div9.style.display = "flex";
                div10.style.display = "none";
                circleid.classList.remove("add_cat_steel");
                squre.classList.remove("add_cat_steel");
                hexahedron.classList.remove("add_cat_steel");
                corner.classList.remove("add_cat_steel");
                ribbon.classList.remove("add_cat_steel");
                beam.classList.remove("add_cat_steel");
                pipe.classList.remove("add_cat_steel");
                plate.classList.remove("add_cat_steel");
                channel.classList.add("add_cat_steel");
                profile_pipe.classList.remove("add_cat_steel");
                subtitle2.innerHTML = " швеллера";
                checkForActiveC();
            } else if (inputValue === "prokat10") {
                div1.style.display = "none";
                div2.style.display = "none";
                div3.style.display = "none";
                div4.style.display = "none";
                div5.style.display = "none";
                div6.style.display = "none";
                div7.style.display = "none";
                div8.style.display = "none";
                div9.style.display = "none";
                div10.style.display = "flex";
                circleid.classList.remove("add_cat_steel");
                squre.classList.remove("add_cat_steel");
                hexahedron.classList.remove("add_cat_steel");
                corner.classList.remove("add_cat_steel");
                ribbon.classList.remove("add_cat_steel");
                beam.classList.remove("add_cat_steel");
                pipe.classList.remove("add_cat_steel");
                plate.classList.remove("add_cat_steel");
                channel.classList.remove("add_cat_steel");
                profile_pipe.classList.add("add_cat_steel");
                subtitle2.innerHTML = " профильной трубы";
                checkForActiveC();
            }
        }
    </script>
    <script>
        var materialType = document.getElementById("materialType");
        var steelType = document.getElementById("steelType");
        var castIron = document.getElementById("castIron");
        var aluminum = document.getElementById("aluminum");
        var bronze = document.getElementById("bronze");
        var brass = document.getElementById("brass");
        var stainlessSteel = document.getElementById("stainlessSteel");
        var copper = document.getElementById("copper");
        var titanium = document.getElementById("titanium");

        steelType.style.display = 'block';
        castIron.style.display = 'none';
        aluminum.style.display = 'none';
        bronze.style.display = 'none';
        brass.style.display = 'none';
        stainlessSteel.style.display = 'none';
        copper.style.display = 'none';
        titanium.style.display = 'none';
    </script>
    <script>
        // select choice count weight or length
        var weigthCalc = document.getElementById("weigth_calc");
        var lengthCalc = document.getElementById("length_calc");
        var weightTogle = document.getElementById("weightTogle");
        var resultBox = document.getElementById("resultBox");
        var resultLengthBox = document.getElementById("resultLengthBox");
        var resultReset = document.getElementById("result");
        var resultLengthReset = document.getElementById("resultLength");
        var resultWeigth = document.getElementById("resultWeigth");
        var weightCount = document.getElementById("weightCount");
        var Price = document.getElementById("Price");
        var calculateDivBtn = document.getElementById("calculate");
        var calculateDivBtn2 = document.getElementById("calculate2");

        weigthCalc.addEventListener("click", function() {
            weigthCalc.classList.add("active_c");
            lengthCalc.classList.remove("active_c");
            weightTogle.classList.add("lenmain");
            resultBox.classList.remove("lenmain");
            resultLengthBox.classList.add("lenmain");
            subtitle.innerHTML = " веса";
            resultReset.innerHTML = "0.00";
            resultLengthReset.innerHTML = "0.000";
            resultWeigth.innerHTML = "0.00";
            weightCount.value = "";
            Price.value = "";
            calculateDivBtn2.classList.add("lenmain");
            calculateDivBtn.classList.remove("lenmain");
        });

        lengthCalc.addEventListener("click", function() {
            weigthCalc.classList.remove("active_c");
            lengthCalc.classList.add("active_c");
            weightTogle.classList.remove("lenmain");
            resultBox.classList.add("lenmain");
            resultLengthBox.classList.remove("lenmain");
            subtitle.innerHTML = " длины";
            resultReset.innerHTML = "0.00";
            resultLengthReset.innerHTML = "0.000";
            resultWeigth.innerHTML = "0.00";
            weightCount.value = "";
            Price.value = "";
            calculateDivBtn.classList.add("lenmain");
            calculateDivBtn2.classList.remove("lenmain");
        });
        
        
    </script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/metallcalculate.js"></script>
    
</body>

</html>

    
