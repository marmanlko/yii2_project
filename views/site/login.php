<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
// $this->params['breadcrumbs'][] = $this->title;
?>


<?php
// use yii\helpers\Html;
$this->title = 'Handysolver';
?>
<div class="container">

    <div style="text-align: center;">
        <div class="pull-left" style="border: 1px solid black ; padding: 3px;"><img src="images/logo.png" alt="image not found" height="80" width="80" />
        </div>
        <h2>To-do List Application</h2>
        <h4>Where to-do items are added/deleted and belong to categories.</h4>
        <br>
        <br>
        <?php?>
        <div style="border: 1px solid black;padding: 15px;">
        <div class="row">
            <div class="col-sm-3">
                <select>
                    <?php foreach($category as $categ)
                    {?>
                    <option><?php echo $categ->name;?></option>
                    <?php
                }
                    ?>
                </select>
            
            </div>
            <div class="col-sm-4">
                <input type="text" name="" style="width: 60%;">
                <button style="background: green;color: white;">Add</button>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <?php
            
            ?>
            <div class="row">
                <table class="table table-bordered" align="center">
                    <thead>
                        <tr>
                            <th>ToDo Item name</th>
                            <th>Category</th>
                            <th>Timestamp</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php if(count($todo)>0)
                        {
                            foreach($todo as $todo ){
                                foreach($category as $categ)
                            ?>
                        <tr>
                            <td><?php echo $todo->name;?></td>
                            <td>
                                <?php 
                                if($todo->category_id == $categ->id)
                                {
                                    echo $categ->name;
                                }
                                else
                                {
                                    echo "NA";
                                }
                            ?>
                                
                            </td>
                            <td><?php echo $todo->timestamp;?></td>
                            <td><?=Html::a('Delete', ['delete','id'=>$todo->id], ['class'=>'btn']);?><span></td>
                        </tr>
                        <?php 
                            }
                        }
                        else {?>
                        <tr>
                            <td>Record not found</td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
                
            </div>
        </div>
        

        </div>
    </div>
</div>

