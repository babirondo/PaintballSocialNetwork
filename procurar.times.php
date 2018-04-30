<?php


        foreach ($time_pesquisados[TIMES] as $id => $linha){
            $p++;

            echo " <TR bgcolor=".(($p%2)?"cccccc":"").">
                        <td>Time: ".$linha["nome"]."</td>
                        <td>Nivel Competicao: ".$linha["nivelcompeticao"]."</td>
                        <td>Local Treino: ".$linha["localtreino"]."</td>
    
                        <td>Owner: ".$linha["idowner"]."</td>
                        <td>Quantidade de Jogadores: ".$linha["qtde_jogadores"]."</td>
                   </TR>
                   <tr bgcolor=".(($p%2)?"cccccc":"").">      
                        <td>Treinos: ".$linha["treino_segunda"]." ".$linha["treino_terca"]." ".$linha["treino_quarta"]." ".$linha["treino_quinta"]." ".$linha["treino_sexta"]." ".$linha["treino_sabado"]." ".$linha["treino_domingo"]." </td>
                        <td>Procurando Jogadores: ".$linha["procurando_snakecorner"]." ".$linha["procurando_snake"]." ".$linha["procurando_backcenter"]." ".$linha["procurando_doritoscorner"]." ".$linha["procurando_doritos"]." ".$linha["procurando_coach"]." </td>
                   </TR>";



    </td>
</tr>