


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



                        <form method="post" id="form-filters" name="form-filters" action="<?php echo site_url('producao/psempresarial/curva_abc_pme') ?>">
                          
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
                                                                <option value="<?php echo $seguradora['codigo'] ?>"><?php echo $seguradora['fantasia'] ?></option>        
                                                            <?php endforeach;?>
                                                        <?php endif;?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <div class="form-line">
                                                <strong><span class="form-group-addon">Canal da Venda</span></strong>
                                                <select name="canalvendas" id="canalvendas">
                                                    <option value="">--Selecione--</option>
                                                      <?php if( isset( $dados['canalvendas'] ) ):  ?>
                                                            <?php foreach( $dados['canalvendas'] as $canalvendas): ?>
                                                                <option value="<?php echo $canalvendas['codigo']; ?>"><?php echo $canalvendas['descricao'] ?></option>        
                                                            <?php endforeach;?>
                                                        <?php endif;?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                       <div class="col-md-6">
                                        <div class="form-group">

                                            <div class="form-line">
                                                <strong><span class="form-group-addon">Origem da Venda</span></strong>
                                                <select name="origemvendas" id="origemvendas">
                                                    <option value="">--Selecione--</option>
                                                      <?php if( isset( $dados['origemvendas'] ) ):  ?>
                                                            <?php foreach( $dados['origemvendas'] as $origemvendas): ?>
                                                                <option value="<?php echo $origemvendas['codigo']; ?>"><?php echo $origemvendas['descricao'] ?></option>        
                                                            <?php endforeach;?>
                                                        <?php endif;?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                               
                                <div class="col-md-3">
                                    <div class="input-group">
                                       <span class="input-group-addon">Período</span>

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
                  
    <div class="col-md-6">
        <div class="input-group input-group-lg">
            <span class="input-group-addon">
                <input value="producao" type="radio" class="with-gap radio-col-indigo"  name="pme-opcao" id="pme-opcao-analitico">
                <label for="pme-opcao-analitico">Produção</label>
            </span>

             <span class="input-group-addon">
            <input value="efetivacao" checked type="radio" class="with-gap radio-col-indigo" name="pme-opcao" id="pme-opcao-sintetico">
            <label for="pme-opcao-sintetico">Efetivação</label>
        </span>
        </div>
    </div>

    

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


          


                <?php if( !is_null( $tipo_relatorio ) && $tipo_relatorio == 'curva_abc_pme' ):  ?>



                    <table class="table responsive-table row-border stripe hover table-bordered table-striped table-hover dataTable">
                        <thead>
                            <tr >
                                <th>Produtor</th>
                                <th>Valor</th>
                                <th>Nº Vidas</th>
                            
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Produtor</th>
                                <th>Valor</th>
                                <th>Nº Vidas</th>
                            </tr>
                        </tfoot>
                        <tbody>
                        
                        <?php if( empty( $relatorio ) ): ?>
                      
                        
                        <?php else: ?>

                            <?php foreach( $relatorio as $r): ?>

                                <tr>
                                    <td><?php echo $r['apelido'] ?></td>
                                    <td><?php echo  number_format($r['pme'], 2, ',', '.') ?></td>
                                    <td><?php echo $r['indiv'] ?></td>
                           
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

