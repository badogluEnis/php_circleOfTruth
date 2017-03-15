<h3>Sende uns hier deine Ideen für neue Fragen zu!</h3><br>


<form action="/idea/create" class="senden">

<div class="formular">

  <div class="col-xs-12">
    <textarea class="form-control" name ="frage" id ="frage" rows="5" cols="30" placeholder="Frage" style="resize:none" required></textarea><br><br>
  </div>

  <div class="col-xs-6 abstand">
     <label for="exampleInputEmail1"></label>
     <input type="text" name="antw1" class="form-control" id="exampleInputEmail1" placeholder="Korrekte Antwortmöglichkeit">
   </div>

   <div class="col-xs-6 abstand">
      <label for="exampleInputEmail1"></label>
      <input type="text" name="antw2" class="form-control" id="exampleInputEmail1" placeholder="Falsche Antwortmöglichkeit">
    </div>

        <label>
          <input type="checkbox"> Die Frage ist eine Moralfrage*
        </label>

      <div class ="submit">
        <button type="submit" name="submit" class="btn btn-success">Absenden</button>
      </div>

      <p class ="radio">* Moralfrage bedeutet, dass es keine richtige Antwort gibt. Trotzdem werden beide Antwortm&oumlglichkeiten ben&oumltigt</p>

</div>

</form>
