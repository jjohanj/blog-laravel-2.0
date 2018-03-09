


@guest
  @else

  <table style="width:100%">
  <tr>
    <td><form action="/posts/color" method="post">
      {{ method_field('Patch') }}
      {{csrf_field()}}
      <input type="hidden" name="color" value="#800000">
      <input type="hidden" name="id" value='{{ Auth::user()->id }}'>
      <button style="background-color: #800000; width:20px; height:20px" type="submit"></button>
    </form></td>
    <td><form action="/posts/color" method="post">
      {{ method_field('Patch') }}
      {{csrf_field()}}
      <input type="hidden" name="color" value="#bd9a79">
      <input type="hidden" name="id" value='{{ Auth::user()->id }}'>
      <button style="background-color: #bd9a79; width:20px; height:20px" type="submit"></button>
    </form></td>
    <td><form action="/posts/color" method="post">
      {{ method_field('Patch') }}
      {{csrf_field()}}
      <input type="hidden" name="color" value="#559f84">
      <input type="hidden" name="id" value='{{ Auth::user()->id }}'>
      <button style="background-color: #559f84; width:20px; height:20px" type="submit"></button>
    </form></td>
    <td><form action="/posts/color" method="post">
      {{ method_field('Patch') }}
      {{csrf_field()}}
      <input type="hidden" name="color" value="#0f628b">
      <input type="hidden" name="id" value='{{ Auth::user()->id }}'>
      <button style="background-color: #0f628b; width:20px; height:20px" type="submit"></button>
    </form></td>
    <td><form action="/posts/color" method="post">
      {{ method_field('Patch') }}
      {{csrf_field()}}
      <input type="hidden" name="color" value="#564f52">
      <input type="hidden" name="id" value='{{ Auth::user()->id }}'>
      <button style="background-color: #564f52; width:20px; height:20px" type="submit"></button>
    </form></td>
      <td><form action="/posts/color" method="post">
      {{ method_field('Patch') }}
      {{csrf_field()}}
      <input type="hidden" name="color" value="#600080">
      <input type="hidden" name="id" value='{{ Auth::user()->id }}'>
      <button style="background-color: #600080; width:20px; height:20px" type="submit"></button></td>

    </tr>

</table>


<script>
src="jquery-3.3.1.min.js"
$().ready(function() {
    $('h2').css({
        'background-color': '{{ Auth::user()->color }}',
    })
    $('.menubutton, .menubutton2, h2').css({
        'background-color': '{{ Auth::user()->color }}',
    })

    ;
});
</script>
@endguest
