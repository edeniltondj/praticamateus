


<?php  
        
    $dados = isset( $all_data['dados']['dados']  ) ? $all_data['dados']['dados'] : array();

    $relatorio = isset( $all_data['relatorio']  ) ? $all_data['relatorio'] : array();

    $tipo_relatorio = isset( $all_data['tipo_relatorio']  ) ? $all_data['tipo_relatorio'] : null;
    
    $relatorio_title = isset( $all_data['titulo_relatorio']  ) ? $all_data['titulo_relatorio'] : 'Relatório - Sem Dados';

   

?>
   <div class="row clearfix margin-0" >
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                

                <button type="button" class="btn bg-indigo waves-effect" data-toggle="collapse" data-target="#div-filtros" aria-expanded="true">
                     <i class="material-icons">filter_list</i> FILTROS
                 </button>  

                 <script type="text/javascript">
                     
                     function export_mic_tb(){
                        $('.table').tableExport({
                            type:'xlsx',
                            tableName: "Relatório Web - Terraviva",
                            worksheetName: 'Relatório Web Terraviva'
                        });
                     } 

                 </script>

                 <button onClick="export_mic_tb()" id="bt-export-table" type="button" class="btn bg-indigo waves-effect na_direita"   >
                      Excel
                 </button>



                 <div class="collapse"  id="div-filtros" >
                    <div class="well">



                        <form method="post" id="form-filters" name="form-filters" action="<?php echo site_url('producao/psempresarial/comissao_pme') ?>">
                          
                          <input type="hidden" name="filters-enableds">


                          <!-- Input Group -->
                          <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="card">

                                    <div class="body">
                                        <div class="row clearfix">

                                            <div class="col-md-6">
                                                <div class="form-group" >

                                                    <div class="form-line" >
                                                       <strong><span class="form-group-addon">Filial</span></strong>
                                                       <select class="bootstrap-select" name="filial" id="filial">
                                                        <option value="">--Selecione--</option>
                                                        <?php if( isset( $dados['filiais'] ) ):  ?>
                                                            <?php foreach( $dados['filiais'] as $filial): ?>
                                                                <option value="<?php echo $filial['filial']; ?>"><?php echo $filial['fantasia'] ?></option>        
                                                            <?php endforeach;?>
                                                        <?php endif;?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>  

                                        <div class="col-md-6">
                                            <div class="form-group">

                                                <div class="form-line">
                                                   <strong><span class="form-group-addon">Seguradora</span></strong>
                                                   <select name="seguradora" id="seguradora">
                                                    <option value="">--Selecione--</option>
                                                      <?php if( isset( $dados['seguradora'] ) ):  ?>
                                                            <?php foreach( $dados['seguradora'] as $seguradora): ?>
                                                                <option value="<?php echo $seguradora['codigo'].'-'.$seguradora['fantasia']; ?>"><?php echo $seguradora['fantasia'] ?></option>        
                                                            <?php endforeach;?>
                                                        <?php endif;?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                               
                                <div class="col-md-3">
                                    <div class="input-group">
                                       <span class="input-group-addon">Produção</span>

                                       <div class="form-line">
                                         <input required name="producao-data-inicio"  type="text" class="form-control date" placeholder="__/__/____">
                                     </div>

                                 </div>
                             </div> 

                             <div class="col-md-3">
                                <div class="input-group">

                                   <span style="margin-right:5px" class="input-group-addon">à </span>

                                   <div class="form-line">
                                     <input  required name="producao-data-fim" type="text" class="form-control date" placeholder="__/__/____">
                                 </div>

                             </div>
                         </div>

               <div class="row clearfix">

    


<div class="col-md-2">
    
    <div class="input-group input-group-lg">
            <span class="input-group-addon">
              <button type="submit" class="btn bg-indigo waves-effect" >
        <!--i class="material-icons">visibility</i--> Visualizar
    </button>
            </span>

        </span>
        </div>
</div>


</div>



        </div>


    </div>
</div>
</div>
</div>
<!-- #END# Input Group -->
    <input value="rad" type="radio" class="with-gap"   name="rdq"/>
</form>










</div>
</div>
</div>

<div class="body">


   <div class="container-fluid">

    <!-- Basic Examples -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>

                    <?php echo $relatorio_title; ?>

                    </h2>

                </div>
                <div class="body">


              <?php if( !is_null( $tipo_relatorio ) && $tipo_relatorio == 'comissao_pme' ):  ?>

                    <table class="table responsive-table row-border stripe hover table-bordered table-striped table-hover dataTable">
                        <thead>
                            <tr >
                                <th>Nome do Segurado</th>
                                <th>Seguradora</th>
                                <th>Vendedor</th>
                                <th>Nº Proposta</th>
                                <th>Apólice</th>
                                <th>Vigência</th>
                                <th>P. Liq</th>
                                <th>Com%</th>
                                <th>Produtor</th>
                                <th>Imposto</th>
                                <th>Ger. Geral</th>
                                <th>Corretora</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                               <th>Nome do Segurado</th>
                                <th>Seguradora</th>
                                <th>Vendedor</th>
                                <th>Nº Proposta</th>
                                <th>Apólice</th>
                                <th>Vigência</th>
                                <th>P. Liq</th>
                                <th>Com%</th>
                                <th>Produtor</th>
                                <th>Imposto</th>
                                <th>Ger. Geral</th>
                                <th>Corretora</th>
                            </tr>
                        </tfoot>
                        <tbody>
                        
                        <?php if( empty( $relatorio ) ): ?>
                       
                        
                        <?php else: ?>

                            <?php foreach( $relatorio as $r): ?>

                                <tr>

                                    <td><?php echo $r['nomecliente'] ?></td>
                                    <td><?php echo $r['nomeseguradora'] ?></td>
                                    <td><?php echo $r['nomevendedor'] ?></td>
                                    <td><?php echo $r['proposta'] ?></td>
                                    <td><?php echo $r['apolice']?></td>
                                    <td><?php echo dateSQLtoBR($r['efetivacao']) ?></td>
                                    <td><?php echo $r['vlrcomissionado'] ?></td>
                                    <td><?php echo $r['com2']; ?></td>
                                    <td><?php $_produtor = $r['vlrcomissionado'] * $r['com2'] / 100;  
                                     echo number_format($_produtor, 2, ',', '.'); 

                                    ?></td>
                                    <td>
                                    <?php 
                                    $_imposto = ($r['vlrcomissionado'] * 0.5 * $r['txadm']) / 100 ; 
                                   echo number_format($_imposto, 2, ',', '.');


                                    ?>
                                      </td>
                                    <td><?php

                                    $_gerente_g = (($r['vlrcomissionado']*0.5)-((($r['vlrcomissionado']*0.5)*$r['txadm'])/100))*0.1;
                                     echo number_format($_gerente_g, 2, ',', '.');

                                     ?></td>

                                    <td><?php 
                                      $_corretora = $r['vlrcomissionado']-(($r['vlrcomissionado']*$r['com2'])/100)-((($r['vlrcomissionado']*0.5)*$r['txadm'])/100)-((($r['vlrcomissionado']*0.5)-((($r['vlrcomissionado']*0.5)*$r['txadm'])/100))*0.1);

                                     echo number_format($_corretora, 2, ',', '.');

                                    ?></td>
                                    
                                </tr>

                            <?php endforeach; ?>

                        <?php endif; ?>
                        </tbody>
                    </table>

                <?php endif; ?>

                    
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Basic Examples -->

</div>





</div>
</div>
</div>
</div>


<script src="<?php echo base_url('src/js/terraviva.js') ?>"></script>


<?php if( isset( $show_filters ) ): ?>
    
    <script type="text/javascript">
        $(function(){
            $('#div-filtros').collapse();

        });
    </script>

<?php endif; ?>


<!--Filtros para relatório de pme-->

