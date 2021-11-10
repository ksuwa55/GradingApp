<?php
include "fetch_moduledata.php";
?>

<html>
    <body>
        <?php if(count($module_cds)!=0){
            
            // calcurate grades from marks
            $grades = [];
            for($i=0; $i<count($marks); $i++){
                if($marks[$i] == 0){
                    $grade = '';
                }elseif($marks[$i] >= 70){
                    $grade = 'A';
                }elseif($marks[$i] >= 60){
                    $grade = 'B';
                }elseif($marks[$i] >= 50){
                    $grade = 'C';
                }else{
                    $grade = 'F';
                }
                array_push($grades, $grade);
            }

            // culculate total credits and mark 
            $total_credit = 0;
            $total_mark = 0;
            $all_credit = 0;
            for($i=0; $i<count($marks);$i++){
                if($marks[$i] > 49){
                    $total_credit += $credits[$i];
                }
                $all_credit += $credits[$i]; // for culcultion of avg_mark (include failed module)
                $total_mark += $marks[$i] * $credits[$i]; 
            }

            // culculate average mark
            $avg_mark = $total_mark / $all_credit
        ?>
        
        <div class = "tables_wrapper">
            <!-- module tabel -->
            <div class="table_container">
                <h4>Modules</h4>
                <table>
                    <tr><th>Module Code</th><th>Module Title</th><th>Credit</th><th>Mark</th><th>Grade</th><th></th></tr>
                    
                    <?php 
                    for($i=0; $i<count($module_cds); $i++){
                    ?> 
                    <tr> 
                        <td><?php echo $module_cds[$i]; ?></td> 
                        <td><?php echo $module_names[$i]; ?></td> 
                        <td><?php echo $credits[$i]; ?></td> 
                        <td><?php echo $marks[$i]; ?></td> 
                        <td><?php echo $grades[$i]; ?></td> 
                        <td>
                            <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fa fa-trash"></i> 
                            </button>  
                        </td>
                    </tr> 
                    <?php 
                    } 
                    ?>
                </table>
            </div>

            <!-- count table -->
            <div class="table_container right_side_table count_table">
                <h5>Counts</h5>
                <table>
                    <tr><th>A</th><th>B</th><th>C</th><th>F</th></tr>
                    <?php 
                    // culculate the count mark 
                    $grade_counts = array_count_values($grades);
                    ?> 
                    <tr> 
                        <td>
                            <?php 
                            if(array_key_exists('A',$grade_counts)){
                                echo $grade_counts['A'];
                            } else echo 0;
                            ?>
                        </td>
                        <td>
                            <?php 
                            if(array_key_exists('B',$grade_counts)){
                                echo $grade_counts['B'];
                            } else echo 0;
                            ?>
                        </td>
                        <td>
                            <?php 
                            if(array_key_exists('C',$grade_counts)){
                                echo $grade_counts['C'];
                            } else echo 0;
                            ?>
                        </td>
                        <td>
                            <?php 
                            if(array_key_exists('F',$grade_counts)){
                                echo $grade_counts['F'];
                            } else echo 0;
                            ?>
                        </td>
                    </tr> 
                </table>
            </div>
        </div>
        
        <div class = "tables_wrapper">
            <!-- qualification and total credit table -->                
            <div class="table_container"> 
                <h4>Qualification</h4>
                <table>
                    <tr><th>Current Qualification</th><th>Total Credit</th></tr>
                    <?php
                        if($total_credit >= 180){
                            $qualification = 'MSc Computing Science';
                        }elseif($total_credit >= 120){
                            $qualification = 'PG Diploma in Computing';
                        }else{
                            $qualification = '';
                        }
                    ?>
                    <tr>
                        <td><?php echo $qualification; ?></td>
                        <td><?php echo $total_credit; ?></td>
                    </tr>
                </table>
            </div>

            <!-- award and avarage mark table -->                
            <div class="table_container right_side_table award_table">
                <h4>Award</h4>
                <table>
                    <tr><th>Overall Award</th><th>Average Mark</th></tr>
                    <?php

                    // inspect whether there is a dissertation module in array
                    if(in_array('TECH7009', $module_cds)){

                        $index = array_search('TECH7009', $module_cds); // get the index of dissertation module

                        if($total_mark==0){
                            $total_grade = '';
                        }elseif($avg_mark >= 70 && $marks[$index] >= 68){
                            $total_grade = 'Distinction';
                        }elseif($avg_mark >= 60 && $marks[$index] >= 58){
                            $total_grade = 'Merit';
                        }elseif($avg_mark >= 50){
                            $total_grade = '';
                        }else{
                            $total_grade = '';
                        }
                    }else{
                        $total_grade = '';
                    }
                    ?>
                    <tr>
                        <td><?php echo  $total_grade; ?></td>
                        <td><?php echo $avg_mark; ?></td>
                    </tr>
                </table>
            </div>
        </div>

        <?php
        }else{
            echo '<p style="margin-top:2em;">no module is entered</p>';
        }
        ?>
    </body>
</html>