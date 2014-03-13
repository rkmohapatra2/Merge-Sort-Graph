<!DOCTYPE html>
<html>
<head>
    <title>Ranjan Kumar Mohapatra</title>
    <script src="ajax.js"></script>
    <style >
    td{
    	vertical-align: top;
    	
    	padding-left: 10px;
    }
    li
    {
     list-style-type:none;	
     width: 100%;
     text-align: left;
      }
      
    </style>
</head>
<body>
	<center><h1>Merge Sort Algorithim</h1>
		<hr />
    <div style="text-align:center">
        This Algorithim Compries of Two Parts Merge and Merge-sort
        <hr width="1050">
        </div>
        <div>
        	<table style="width:70%;  ">
            <tr>
            <td style="width:40%; border-right: 2px solid black;">&nbsp;
       <li style="color:#C00;">MERGE(A,p,q,r)</li><li> 	
       1.&thinsp;n1 <- q-p+1 </li><li>
       2.&thinsp;n2 <- r-q</li><li>
       3.&thinsp;create arrays L[1,2,...n1+1] and R[1,2,...n1+1]</li><li>
       4.&thinsp;for i <- 1 to n1 </li><li>
       5.&thinsp; &emsp; do L[i] <- A[p+i-1]</li><li>
       6.&thinsp;for j <- 1 to n2 </li><li>
       7.&thinsp; &emsp; do R[j] <- A[q+j]</li><li>
       8.&thinsp;L[n1 +1] <- &infin;</li><li>
       9.&thinsp;R[n2 +1] <- &infin;</li><li>
       10.&thinsp;i <-1 </li><li>
       11.&thinsp;j <-1 </li><li>
       12.&thinsp;for k <- p to r </li><li>
       13.&thinsp;&emsp;if L[i] <= R[j] </li><li>
       14.&thinsp;&emsp;&emsp;then A[k]<- L[i] </li><li>
       16.&thinsp;&emsp;&emsp;i <- i++</li><li>
       17.&thinsp;&emsp;else A[k]<- R[i] </li><li>
       18.&thinsp;&emsp;&emsp;i <- i++</li>
       </td>
            <td style="border-right: 2px solid black;">&nbsp;<li style="color:#C00;">MERGE-SORT(A,p,r)</li><li> 	
       1.&thinsp;if p > r </li><li>
       2.&thinsp;&emsp;  then q <- (p+r)/2 </li><li>
       3.&thinsp;MERGE-SORT(A,p,q)</li><li>
       4.&thinsp;MERGE-SORT(A,q+1,r)</li><li>
       5.&thinsp;MERGE(A,p,q,r)</li></td>
            <td>&nbsp;
            <p>Where A= List Of Elements<br/>
               p=Starting Index<br>
               q=Partition<br>
               r=Ending Index<br>
            </p>    
            </td>
            </tr>
            </table>
        
 <hr width="1050">
	<p>Input The Valuse:<input id="search" type="search" name="search" placeholder="Ex 25,12.."  ><input type="button" value="Submit" onclick="sendString(search.value)" ></p>

	<div id="sug"></div>
	</center>
</body>
</html>