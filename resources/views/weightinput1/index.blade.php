<form method="POST" action="{{url('weight/output1')}}">
  <h4>OSHI</h4>
  date : <input type="text" name="date" value="<?php echo $today; ?>">
  weight : <input type="text" name="weight">
  fatper : <input type="text" name="fatper">
  <input type="submit" value="submit">
  <input type="hidden" name="_token" value="{{csrf_token()}}">
</form>

<h5>OSHI DATA</h5>
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

<h5>KANOKO DATA</h5>
<div class="container">
  <TABLE border="1" align="left">
    <TR>
      <TD>date</TD>
      <TD>weight</TD>
      <TD>fatper</TD>
    </TR>

    @foreach ($weightlist_rival as $weightlist_rival)
    <TR>
      <TD>{{ $weightlist_rival->date }}</TD>
      <TD>{{ $weightlist_rival->weight }}</TD>
      <TD>{{ $weightlist_rival->fatper }}</TD>
    </TR>
    @endforeach

  </TABLE>
  <br clear="all"><br><br>
</div>
