<style>
table, th{
	border: 1px solid black;
}
.finde{
	background-color: gray;
}
.titulo{
	text-align: center;
}
td{
	border: 1px solid black;
	text-align:center;
}
.hora{
	width: 16%;
}
.data{
	width: 6%;
}
.assinatura{
	width: 30%;
}
.nome{
	width: 70%;
}
.mes{
	width: 30%;
}
</style>
<?php
$meses['m'] = array("jan","fev","mar","abr","mai","jun","jul","ago","set","out","nov","dez");
$meses['M'] = array("janeiro","fevereiro","março","abril","maio","junho","julho","agosto","setembro","outubro","novembro","dezembro");

// Transforma em datetime
$mes['a'] = new Datetime();
$mes['p'] = new Datetime();
$mes['p']->modify("1 month");
?>
<form>
<input name="nome" type="text">
<select name="mes">
<option value="<?php echo $mes['a']->format('Y-m'); ?>"><?php echo $meses['m'][$mes['a']->format('m')-1].$mes['a']->format('/Y') ?></option>
<option value="<?php echo $mes['p']->format('Y-m'); ?>"><?php echo $meses['m'][$mes['p']->format('m')-1].$mes['p']->format('/Y') ?></option>
</select>
    <select name="exce[]" multiple>
        <option value="01">01</option>
        <option value="02">02</option>
        <option value="03">03</option>
        <option value="04">04</option>
        <option value="05">05</option>
        <option value="06">06</option>
        <option value="07">07</option>
        <option value="08">08</option>
        <option value="09">09</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>
        <option value="21">21</option>
        <option value="22">22</option>
        <option value="23">23</option>
        <option value="24">24</option>
        <option value="25">25</option>
        <option value="26">26</option>
        <option value="27">27</option>
        <option value="28">28</option>
        <option value="29">29</option>
        <option value="30">30</option>
        <option value="31">31</option>
    </select>
<button type="submit">Gerar</button>
</form><pre>
<?php
if(isset($_GET['mes'])){
$mesatual = date('Y-m');
$mesatual = @$_GET['mes'];
    @$dias = $_GET["exce"];

// Transforma em datetime
$data['inicio'] = new Datetime($mesatual);
$data['fim'] = new Datetime($mesatual);

// Adiciona um dia, porque o array do foreach começa de 0
$data['fim']->modify('1 month');

// Intervalo de 1 dia
$interval = new DateInterval("P1D");

// Crio um array com as datas do periodo definido
$periodoVigente = new DatePeriod($data['inicio'], $interval ,$data['fim']);

    $excessao = Array();
    for($x=0;$x<count($dias);$x++){
        $excessao[] = new DateTime($mesatual."-".$dias[$x]);
    }
//print_r($exce);

    $html = '<table>
<tdead>
<tr class="esq"><th class="nome" colspan="5">Nome: '.$_GET["nome"].'</th><th class="mes">Mês: '.$meses["M"][$data["inicio"]->format("m")-1].'</th></tr>
<tr class="titulo"><th class="data">Dia</th><th class="hora">Entrada</th><th class="hora">Saída</th><th class="hora">Entrada</th><th class="hora">Saída</th><th class="assinatura">Assinatura</th></tr>
 </thead>
';
// Agora, percorro o array, pegando apenas datas
foreach ($periodoVigente as $dataPeriodo)
{
	// Se não for final de semana (php >= 5.1)
	if (!(date('N', strtotime($dataPeriodo->format('Y-m-d'))) >= 6) && !(in_array($dataPeriodo, $excessao)))
	{
	    //print_r($dataPeriodo);
			$html .= "<tr><td>{$dataPeriodo->format('d')}</td><td></td><td></td><td></td><td></td><td></td></tr>\n";
	}else{
			$html .= "<tr class=\"finde\"><td >{$dataPeriodo->format('d')}</td><td></td><td></td><td></td><td></td><td></td></tr>\n";
	}
}
}
@$html .= '</table>';
echo "<pre>";
print_r($html);



sprintf("%02s\n", $x);
printf("%02s",   31);
?>