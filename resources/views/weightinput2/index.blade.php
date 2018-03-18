<form method="POST" action="{{url('weight/output2')}}">
  date : <input type="text" name="date" value="<?php echo $today; ?>">
  weight : <input type="text" name="weight">
  fatper : <input type="text" name="fatper">
  <input type="submit" value="submit">
  <input type="hidden" name="_token" value="{{csrf_token()}}">
</form>

<div class="container">
  <TABLE border="1" align="left">
    <TR>
      <TD>date</TD>
      <TD>weight</TD>
      <TD>fatper</TD>
    </TR>

    @foreach ($weightlist as $weightlist)
    <TR>
      <TD>{{ $weightlist->date }}</TD>
      <TD>{{ $weightlist->weight }}</TD>
      <TD>{{ $weightlist->fatper }}</TD>
    </TR>
    @endforeach

  </TABLE>
  <br clear="all"><br><br>
</div>

