<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Json;

$this->title = 'Weather Search App in Yii';
$location = isset($_POST['location']) ? $_POST['location'] : '';
?>

<style>
    .weather-search {
        margin: 20px;


    }
    .w-300{
        width:300px;
    }

    .search_bar {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        column-gap: 20px;
        row-gap: 20px;
    }

    .weather-search input[type='text'] {
        padding: 8px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .weather-search button {
        padding: 8px 65px;
        font-size: 16px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .weather-search button:hover {
        background-color: #0056b3;
    }

    .table-responsive {
        overflow-x: auto;
        margin: 40px 0;
    }

    .weather-table {
        width: 100%;
        border-collapse: collapse;
    }

    .weather-table th,
    .weather-table td {
        padding: 8px;
        text-align: center;
        border: 1px solid #ddd;
    }

    .weather-table th {
        background-color: #f2f2f2;
    }

    /* Responsive styles */
    @media screen and (max-width: 767px) {
        .table-responsive {
            overflow-x: scroll;
        }
    }
</style>


<div class="site-index">
    <div class="weather-search">
        <div class="search_bar">
            <h2>Weather Search</h2>
            <?php $form = ActiveForm::begin(['action' => ['site/search'], 'id' => 'weather-form', 'method' => 'post']); ?>

            <?= Html::textInput('location', $location, ['required' => true, 'autofocus' => true, 'class' => 'form-control w-300', 'placeholder' => 'Enter location']) ?>
            <div class="form-group my-2">
                <?= Html::submitButton('Search', ['class' => 'btn btn-primary btn-block w-300', 'name' => 'search-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
        <div class="table-responsive">
        <table class="weather-table">
        <?php if (@$weatherData): ?>
            <thead>
                <tr>
                    <th>Time</th>
                    <th>Temperature (&deg;F)</th>
                    <th>Feels Like (&deg;F)</th>
                    <th>Humidity (%)</th>
                    <th>Dew Point (&deg;F)</th>
                    <th>Wind Speed (mph)</th>
                    <th>Wind Gust (mph)</th>
                    <th>Wind Direction (&deg;)</th>
                    <th>Pressure (mb)</th>
                    <th>Visibility (mi)</th>
                    <th>Cloud Cover (%)</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($weatherData as $hour): ?>
                    <tr>
                        <td><?= $hour['datetime'] ?></td>
                        <td><?= $hour['temp'] ?></td>
                        <td><?= $hour['feelslike'] ?></td>
                        <td><?= $hour['humidity'] ?></td>
                        <td><?= $hour['dew'] ?></td>
                        <td><?= $hour['windspeed'] ?></td>
                        <td><?= $hour['windgust'] ?></td>
                        <td><?= $hour['winddir'] ?></td>
                        <td><?= $hour['pressure'] ?></td>
                        <td><?= $hour['visibility'] ?></td>
                        <td><?= $hour['cloudcover'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        <?php endif; ?>
    </table>
        </div>
    </div>
</div>

