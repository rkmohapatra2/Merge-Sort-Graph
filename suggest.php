        <?php
              $q=$_GET["q"];
              function divide($q)
              {

                if($q[strlen($q)-1]!=',')
                  $q=$q.",";
                
                $l=0;
                $s=strpos($q, ",")+1;
                $a[]=-1;
                while($l< strlen($q))
                {
                    $a[]=substr($q, $l, $s-1-$l);
                    $l=$s;
                    $s=strpos($q, "," , $l)+1;
                    
                }  
                return $a;
              }
              function lines($main,$h,$c,&$line)
              {
                for ($i=0; $i < $h ; $i++) { 
                     for ($j=0; $j < $c; $j++) { 
                       $line[$i][$j]=0;
                       
                     }
                   }
                   
                for ($i=1; $i < $h ; $i++) { 
                     for ($j=1; $j < $c-1; $j++) {
                       $m=0;
                       $n=0;
                       for ($k=0 ; $k < $j ; $k++ ) { 
                        if($main[$i][$k]>0)
                          $m++;
                        }
                        for ($k=$j ; $k < $c ; $k++ ) { 
                        if($main[$i][$k]>1)
                          $n++;
                        } 
                       if($m%2==1 && $n>0)
                       {
                       $line[$i][$j]=1;
                       }
                     }
                   }   
              }
              function atualprint(&$main,$h,$c)
              {
                  $line=array();
                  lines($main,$h,$c,$line); 
                  echo '<table width="'.($c*60).'" height="'.($h*47).'" style="border-collapse: collapse;border-style:solid;border-color:#FFF;">';
                     for($i=0; $i< $h ; $i++)
                     {
                        echo '<tr>';
                        for ($j=0; $j < $c ; $j++) 
                        {
                         if($main[$i][$j] >1) 
                         echo '<td style="background-color: #A1E2FF;"><center>&nbsp;'.$main[$i][$j].'</center></td>';
                         else
                         { 
                          if($line[$i][$j]==1)
                          echo '<td width="60" style="border-top: 2px solid black;">&nbsp;</td>';
                          else
                            echo '<td width="60" style="border-top: 2px solid white;">&nbsp;</td>';
                          
                         }
                        }
                        echo "</tr>";
                      }
                    echo "</table><br><br>";
                   

                 }
              function printme($a)
              {
                 $h=ceil(log(count($a)+1,2));
                 
                 $c=pow(2,$h)-1;
                 $main=array();
                 $d=array();
                 $stor=array();
                 for ($i=0; $i <$h ; $i++) { 
                   for ($j=0; $j < $c; $j++) { 
                     $d[$i][$j]=0;
                     $stor[$j]=0;
                     $main[$i][$j]=0;
                   }
                 }
                 
                 
                 for($i=$h-1; $i>=0 ; $i--)
                 {
                 
                  for ($j=0; $j < $c ; $j++) 
                  { 
                    $p=bloc($i,$j,$c,$h,$d);
                    if($p>= 0)
                    {
                     $stor[$j]=1;
                     $main[$i][$j]=1; 
                         
                     }
                      else
                      {
                        if($d[$i][$j]==1)
                          $stor[$j]=1;
                 
                      }
                   } 
                  
                  for ($m=0; $m < $h; $m++) { 
                      for ($j=0; $j < $c; $j++) { 
                      $d[$m][$j]=$stor[$j];
                     
                     }
                  }  
                   for ($j=0; $j < $c; $j++) { 
                    $stor[$j]=0;
                     
                   }

                 
                 }
                 $dem=0;
                 for ($i=0; $i < $h; $i++) { 
                   for ($j=0; $j <$c ; $j++) { 
                     if($main[$i][$j]==1 && $dem < count($a))
                     {
                      if($a[$dem]==-1)
                      {
                        ++$dem;
                       }
                      $main[$i][$j]=$a[$dem];
                      $dem++;
                      }
                   }
                 }

                    atualprint($main,$h,$c);    
              }
              function bloc($i,$j,$c,$h,&$d)
              {
                $k=-1;
                $l=0;
                for ($m=0; $m < $j; $m++) { 
                  if($d[$i][$m]==0)
                    $l++;
                }
                if($l%2 == 0 && $d[$i][$m]==0)
                 {
                 $k=$j;
                 }
                 
                 return $k;
              }
              function printstac($b)
              {
                echo '<p>Stack B= <table width="'.(count($b)*60).'" border="1">';
                echo "<tr>";
                for ($i=0; $i < count($b) ; $i++) { 
                  echo '<td style="background-color: #C00;">&nbsp;'.$b[$i].'</td>';
                }
                echo '</tr></table></p><hr width="1050">';
                
              }
              function max_heap(&$a ,$i)
              {
                $l=$i*2;
                $r=$i*2+1;
                $large;
                if($l< count($a) && $a[$l]>$a[$i])
                {
                  $large=$l;
                }
                else
                  $large=$i;
               if($r< count($a) && $a[$r]>$a[$large])
                {
                  $large=$r;
                }
                if($large!=$i)
                {
                  $temp=$a[$large];
                  $a[$large]=$a[$i];
                  $a[$i]=$temp;
                  max_heap($a,$large);
                }
               
              }
              function built_heap(&$a)
              {
                for($i=floor(count($a)/2);$i>0;$i--)
                {
                  max_heap($a,$i);
                }
              }
              function heap(&$a,&$b)
              {
                built_heap($a);
                for ($i=count($a)-1; $i >=1 ; $i--) 
                { 
                  
                  
                  printme($a);
                  printstac($b);
                  $temp1=$a[1];
                  $a[1]=$a[$i];
                  $a[$i]=$temp1;
                  $b[]=$a[$i];
                  unset($a[$i]);
                  max_heap($a,1);
                }
              }
              $a=divide($q);
              echo "<br>";         
              heap($a,$b);
              echo "<br>";
              echo "<p>The Final Shorted Array Is<p>";
              printstac($b);

			?>