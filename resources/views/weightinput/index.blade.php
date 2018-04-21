<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@extends('layouts.common')

@section('content')
<form method="POST" action="{{url('weight/output')}}">
  <h4 class="bg_info">{{ $accessUserData->name }}</h4>
  date : <input type="text" name="date" value="{{ $today }}">
  weight : <input type="text" name="weight" value="{{ $weightlist[0]->weight }}">
  fatper : <input type="text" name="fatper" value="{{ $weightlist[0]->fatper }}">
  <p>comment : <input type="textarea" name="comment" value="コメント"></p>
  <input type="submit" value="submit">
  <input type="hidden" name="_token" value="{{csrf_token()}}">
  <input type="hidden" name="id" value="{{ $accessUserData->id}}">
  <input type="hidden" name="uri" value="{{ $accessUserData->uri}}">
  <input type="hidden" name="rival_id" value="{{ $rivalUserData->id}}">
</form>

<h5>{{ $accessUserData->name }} DATA</h5>
<div class="container">
  <TABLE border="1" align="left">
    <TR>
      <TD>測定日</TD>
      <TD>体重</TD>
      <TD>体脂肪率</TD>
      <TD>コメント</TD>
    </TR>

    @foreach ($weightlist as $weightlist)
    <TR>
      <TD>{{ $weightlist->date }}</TD>
      <TD>{{ $weightlist->weight }}</TD>
      <TD>{{ $weightlist->fatper }}</TD>
      <TD>{{ $weightlist->comment }}</TD>
    </TR>
    @endforeach

  </TABLE>
  <br clear="all"><br><br>
</div>

<h5>{{ $rivalUserData->name}} DATA</h5>
<div class="container">
  <TABLE border="1" align="left">
    <TR>
      <TD>測定日</TD>
      <TD>体重</TD>
      <TD>体脂肪率</TD>
      <TD>コメント</TD>
    </TR>

    @foreach ($weightlist_rival as $weightlist_rival)
    <TR>
      <TD>{{ $weightlist_rival->date }}</TD>
      <TD>{{ $weightlist_rival->weight }}</TD>
      <TD>{{ $weightlist_rival->fatper }}</TD>
      <TD>{{ $weightlist_rival->comment }}</TD>
    </TR>
    @endforeach

  </TABLE>
  <br clear="all"><br><br>
</div>
@endsection
