
    <div class="main">
    <form class="form_enter_bbox"  method="post">
        <p class="head_reg">ИМПОРТ</p>
        <span>Импортируемый файл </span> <br>
        <input type="file" id="inputfile" name="inputfile"/><br><br>
        <span>Супервайзер </span><span class="red"><?php echo \Core\User\CollectorError::$error_pass; ?>  </span><br>
        <input type="password" name="pass1" placeholder="Супервайзер" size="18"  class="text_forma"/><br><br>
        <button class="enter_box_red" value="t54332" name="get_rec">Импортировать</button>
    </form>
    </div>


</body>

</html>