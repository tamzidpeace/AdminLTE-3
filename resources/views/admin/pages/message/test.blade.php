@for ($i = 0; $i < count($keys3); $i++) <ul class="list-group">
     <li class="list-group-item">
          @php
          $time = $data[$keys[$index]][$keys2[$index2]][$keys3[$i]]['receivedTime'];
          $x = substr($time, 9, 14);
          $h = substr($x, 0, 2);
          $m = substr($x, 2, 2);

          $year = substr($time, 0, 8);
          $yy = substr($year, 0, 4);
          $mm = substr($year, 4, 2);
          $dd = substr($year, 6, 2);
          @endphp
          <p>{{ $data[$keys[$index]][$keys2[$index2]][$keys3[$i]]['msgBody'] }} <br> <small
                    style="float:right; color: #4bad1a">{{  $yy . '-' . $mm .'-' .$dd .', '.$h.'-'.$m }}</small> </p>

     </li>
     </ul>
     @endfor