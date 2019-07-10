<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
 
<form action="" method="post" accept-charset="utf-8"  >
            
   
            <div class="modal-body">
              <table class="table ">
                <tbody>
                              <tr>
                                    <td>คำนำหน้า : </td>
                                    <td><input type="text" class="form-control" name="title_name" value="<?php echo  $arr[title_name]; ?>">     </td>
                              </tr>
                              <tr>
                                    <td>ชื่อ : </td>
                                    <td><input type="text" class="form-control" name="s_name" value="<?php echo  $arr[s_name] ; ?>">     </td>
                              </tr>
                              <tr>
                                    <td>นามสกุล : </td>
                                    <td><input type="text" class="form-control" name="l_name" value="<?php echo  $arr[l_name]  ; ?>">     </td>
                              </tr>
                              <tr>
                                    <td>ปีเกิด : </td>
                                    <td>
                                             <select name="birth_year" class="form-control">
                                                  <?php for ($i=0; $i < 100; $i++) {  ?>
                                                       <option value="<?php echo 2562- $i ; ?>" <?php if (  2562- $i == $arr[birth_year]) {
                                                             echo 'selected';
                                                       } ?>  ><?php echo 2562- $i ; ?></option>
                                                  <?php } ?>
                                             </select>
                                    </td>
                              </tr>
                  <tr>
                    <td>มหาวิทยาลัย : </td>
                    <td><input type="text" class="form-control" name="university" value="<?php echo $arr[university]; ?>"></td>
                  </tr>
                  <tr>
                    <td>ระดับ : </td>
                    <td>
                                          <select name="success_degree" class="form-control" required="">
                                                <option value="ปริญญาตรี" <?php if($arr[success_degree] == 'ปริญญาตรี' ){echo 'selected';} ?> >ปริญญาตรี</option>
                                                <option value="ปริญญาโท"<?php if($arr[success_degree] == 'ปริญญาโท' ){echo 'selected';} ?>>ปริญญาโท</option>
                                                <option value="ปริญญาเอก"<?php if($arr[success_degree] == 'ปริญญาเอก' ){echo 'selected';} ?>>ปริญญาเอก</option>
                                          </select>
                                    </td>
                  </tr>
                  <tr>
                    <td>คณะ : </td>
                    <td><input type="text" class="form-control" name="facutly" value="<?php echo $arr[facutly]; ?>"></td>
                  </tr>
                  <tr>
                    <td>สาขา : </td>
                    <td><input type="text" class="form-control" name="major" value="<?php echo $arr[major]; ?>"></td>
                  </tr>
                  <tr>
                    <td>วุฒิการศึกษา : </td>
                    <td><input type="text" class="form-control" name="qualification" value="<?php echo $arr[qualification]; ?>"></td>
                  </tr>
                  <tr>
                    <td>ปีที่เริมการศึกษา : </td>
                    <td>
                                             <select name="year_start" class="form-control">
                                                  <?php for ($i=0; $i < 40; $i++) {  ?>
                                                       <option value="<?php echo 2562- $i ; ?>" <?php if (  2562- $i == $arr[year_start]) {
                                                             echo 'selected';
                                                       } ?>  ><?php echo 2562- $i ; ?></option>
                                                  <?php } ?>
                                             </select>
                                    </td>
                  </tr>
                  <tr>
                    <td>ปีที่จบการศึกษา : </td>
                    <td>
                                             <select name="year_end" class="form-control">
                                                  <?php for ($i=0; $i < 40; $i++) {  ?>
                                                       <option value="<?php echo 2562- $i ; ?>" <?php if (  2562- $i == $arr[year_end]) {
                                                             echo 'selected';
                                                       } ?>  ><?php echo 2562- $i ; ?></option>
                                                  <?php } ?>
                                             </select>
                                    </td>
                  </tr>
                  <tr>
                    <td>เบอร์โทรศัพท์ : </td>
                    <td><input type="text" class="form-control" name="phone_number" value="<?php echo $arr[phone_number]; ?>"></td>
                  </tr>
                  <tr>
                    <td>อีเมล : </td>
                    <td><input type="text" class="form-control" name="email" value="<?php echo $arr[email]; ?>"></td>
                  </tr>
                  <tr>
                    <td>สถานะภาพการทำงานปัจจุบัน : </td>
                    <td>
                                          <select name="status_study" class="form-control">
                                               <option value="">ไม่ได้เลือก</option>
                                                <option value="อยู่ระหว่างการศึกษา" <?php if($arr[status_study] == 'อยู่ระหว่างการศึกษา' ){echo 'selected';} ?>>อยู่ระหว่างการศึกษา</option>
                                               <option value="ยังไม่มีงานทำ" <?php if($arr[status_study] == 'ยังไม่มีงานทำ' ){echo 'selected';} ?>>ยังไม่มีงานทำ</option>
                                             <option value="ทำงานตรงสาย" <?php if($arr[status_study] == 'ทำงานตรงสาย' ){echo 'selected';} ?>>ทำงานตรงสาย</option>
                                             <option value="ทำงานไม่ตรงสาย" <?php if($arr[status_study] == 'ทำงานไม่ตรงสาย' ){echo 'selected';} ?>>ทำงานไม่ตรงสาย</option>
                                          </select>
                                    </td>
                  </tr>
                  <tr>
                    <td>จังหวัดที่อาศัยในปัจจุบัน : </td>
                    <td>


                                                            <select class="form-control" name="place_now" required="" >
                                                                  <option value="">กรุณาเลือก</option>
                                                                  <?php $sql_prov = pg_query("select pv_tn from tambon group by pv_tn order by pv_tn asc"); 
                                                                  while ($arr_prov = pg_fetch_array($sql_prov)) {
                                                                  ?>
                                                                  <option value="<?php echo $arr_prov[pv_tn]; ?>" <?php if($arr[place_now] == $arr_prov[pv_tn] ){echo 'selected';} ?> ><?php echo $arr_prov[pv_tn]; ?></option>
                                                                  <?php } ?>
                                                            </select>          


                                    </td>
                  </tr>
                  <tr>
                    <td>รูปแบบการนำเข้า : </td>
                    <td><?php echo $arr[type_input]; ?></td>
                  </tr>
                  <tr>
                    <td>วันที่นำเข้า : </td>
                    <td><?php echo $arr[date_access]; ?></td>
                  </tr>
                  
                </tbody>
              </table>
                 
            </div>
            <div class="modal-footer">
                  <input type="hidden" name="id_no" value="<?php echo $arr[id_no]; ?>">
                   <button type="submit" class="btn btn-success" name="update" >บันทึกข้อมูล</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
       </form>

 
 
  
</div>

</body>
</html>
