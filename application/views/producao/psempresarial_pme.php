<?php

$dados = isset($all_data['dados']['dados']) ? $all_data['dados']['dados'] : array();

$relatorio = isset($all_data['relatorio']) ? $all_data['relatorio'] : array();

$tipo_relatorio = isset($all_data['tipo_relatorio']) ? $all_data['tipo_relatorio'] : null;

$relatorio_title = isset($all_data['titulo_relatorio']) ? $all_data['titulo_relatorio'] : 'Sem dados visualizados, clique no botão filtros, preencha os dados e clique em Visualizar';

?>
   <div class="row clearfix margin-0 semmargemvrs" >
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 semmargemvrs">
        <div class="card semmargemvrs">
            <div class="header semmargemvrs">

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

                 <div class="collapse semmargemvrs"  id="div-filtros" >
                    <div class="well semmargemvrs">

                        <form method="post" id="form-filters" name="form-filters" action="<?php echo site_url('producao/psempresarial/pme') ?>">

                          <input type="hidden" name="filters-enableds">

                          <!-- Input Group -->
                          <div class="row clearfix semmargemvrs">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 semmargemvrs">
                                <div class="card semmargemvrs">

                                    <div class="body semmargemvrs">
                                        <div class="row clearfix semmargemvrs">

                                            <div class="col-md-6">
                                                <div class="form-group" >

                                                    <div class="form-line" >
                                                       <strong><span class="form-group-addon">Filial</span></strong>
                                                       <select class="bootstrap-select" name="filial" id="filial">
                                                        <option value="">--Selecione--</option>
                                                        <?php if (isset($dados['filiais'])): ?>
                                                            <?php foreach ($dados['filiais'] as $filial): ?>
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
                                                      <?php if (isset($dados['seguradora'])): ?>
                                                            <?php foreach ($dados['seguradora'] as $seguradora): ?>
                                                                <option value="<?php echo $seguradora['codigo'] . '-' . $seguradora['fantasia']; ?>"><?php echo $seguradora['fantasia'] ?></option>
                                                            <?php endforeach;?>
                                                        <?php endif;?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <div class="form-line">
                                                <strong><span class="form-group-addon">Produtor</span></strong>
                                                <select name="produtor" id="produtor">
                                                    <option value="">--Selecione--</option>
                                                      <?php if (isset($dados['produtor'])): ?>
                                                            <?php foreach ($dados['produtor'] as $produtor): ?>
                                                                <option value="<?php echo $produtor['codigo']; ?>"><?php echo $produtor['apelido'] ?></option>
                                                            <?php endforeach;?>
                                                        <?php endif;?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <div class="form-line">
                                              <strong> <span class="form-group-addon negrito">Status</span></strong>
                                               <select name="status" id="status">
                                                <option value="">--Selecione--</option>
                                                  <?php if (isset($dados['status'])): ?>
                                                            <?php foreach ($dados['status'] as $codigo => $status): ?>
                                                                <option value="<?php echo $codigo ?>"><?php echo $codigo . ' - ' . $status ?></option>
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
                                         <input  name="producao-data-inicio"  type="text" class="form-control date" placeholder="__/__/____">
                                     </div>

                                 </div>
                             </div>

                             <div class="col-md-3">
                                <div class="input-group">

                                   <span style="margin-right:5px" class="input-group-addon">à </span>

                                   <div class="form-line">
                                     <input   name="producao-data-fim" type="text" class="form-control date" placeholder="__/__/____">
                                 </div>

                             </div>
                         </div>


                         <div class="col-md-3">
                            <div class="input-group">
                               <span class="input-group-addon">Vigência</span>

                               <div class="form-line">
                                 <input name="vigencia-data-inicio"  type="text" class="form-control date" placeholder="__/__/____">
                             </div>

                         </div>



                     </div>

                     <div class="col-md-3">
                        <div class="input-group">

                           <span style="margin-right:5px" class="input-group-addon">à </span>

                           <div class="form-line">
                             <input  name="vigencia-data-fim" type="text" class="form-control date" placeholder="__/__/____">
                         </div>

                     </div>
                 </div>

              <div class="row clearfix">

    <div class="col-md-6">
        <div class="input-group input-group-lg">
            <span class="input-group-addon">
                <input value="analitico" type="radio" class="with-gap radio-col-indigo"  name="pme-opcao" id="pme-opcao-analitico">
                <label for="pme-opcao-analitico">Analítico</label>
            </span>

             <span class="input-group-addon">
            <input value="sintetico" checked type="radio" class="with-gap radio-col-indigo" name="pme-opcao" id="pme-opcao-sintetico">
            <label for="pme-opcao-sintetico">Sintético</label>
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


                <?php if (!is_null($tipo_relatorio) && $tipo_relatorio == 'sintetico'): ?>

                    <table class="table responsive-table row-border stripe hover table-bordered table-striped table-hover dataTable">
                        <thead>
                            <tr >
                                <th>Seguradora</th>
                                <th>Propostas</th>
                                <th>Valor</th>
                                <th>Vidas</th>
                            </tr>
                        </thead>
                        
                        <tbody>

                        <?php if (empty($relatorio)): ?>
                      <tfoot>
                            <tr>
                                <th>Total Geral</th>
                                <th>0</th>
                                <th>0,00</th>
                                <th>0</th>
                            </tr>
                        </tfoot>

                        <?php else: 
                          $tot_qtd = 0;
                          $tot_valor = 0;
                          $tot_vidas = 0;

                        ?>
                            
                            <?php foreach ($relatorio as $r): ?>

                                <tr>
                                    <td><?php echo $r['fantasia'] ?></td>
                                    <td><?php echo $r['qtd'];$tot_qtd+=$r['qtd']; ?></td>
                                    <td><?php echo number_format($r['total'], 2, ',', '.'); $tot_valor+=$r['total']; ?></td>
                                    <td><?php echo $r['vidas'];$tot_vidas+=$r['vidas']; ?></td>
                                </tr>

                            <?php endforeach;?>
                          <tfoot>
                            <tr>
                                <th><center>Total Geral</center></th>
                                <th><?php echo $tot_qtd?></th>
                                <th><?php echo number_format($tot_valor, 2, ',', '.');?></th>
                                <th><?php echo $tot_vidas?></th>
                            </tr>
                        </tfoot>
                        <?php endif;?>
                        </tbody>
                    </table>



                <?php elseif (!is_null($tipo_relatorio) && $tipo_relatorio == 'analitico'): 
                          $tot_valor = 0;
                          $tot_vidas = 0;

                ?>



                    <table class="table responsive-table row-border stripe hover table-bordered table-striped table-hover dataTable">
                        <thead>
                            <tr >
                                <th>Produção</th>
                                <th>Nome do Cliente</th>
                                <th>Vidas</th>
                                <th>Pgto</th>
                                <th>Valor</th>
                                <th>Nome do Vendedor</th>
                                <th>Proposta</th>
                                <th>Plano</th>
                                <th>Acomodação</th>
                                <th>Telefone</th>
                                <th>CNPJ</th>
                                <th>Apólice</th>
                                <th>Vigência</th>
                            </tr>
                        </thead>
                       
                        <tbody>

                        <?php if (empty($relatorio)): ?>
                            <tfoot>
                            <tr>
                                <th><center>Total Geral</center></th>
                                <th></th>
                                <th>aqui sao os valores  das vidas</th>
                                <th></th>
                                <th>aqui valor total</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tfoot>

                        <?php else: ?>

                            <?php foreach ($relatorio as $r): ?>

                                <tr>
                                    <td><?php echo dateSQLtoBR($r['producao']) ?></td>
                                    <td><?php echo $r['nomesegurado'] ?></td>
                                    <td><?php echo $r['vidas'] ; $tot_vidas+=$r['vidas'];?></td>
                                    <td><?php echo $r['formapgtoA'] ?></td>
                                    <td><?php echo $r['vlrcomissionado'] ; $tot_valor+=$r['vlrcomissionado'];?></td>
                                    <td><?php echo $r['apelido'] ?></td>
                                    <td><?php echo $r['proposta'] ?></td>
                                    <td><?php echo $r['nome'] ?></td>
                                    <td><?php echo getFullNameAcomodacao($r['acomodacao']) ?></td>
                                    <td><?php echo str_to_format_telefone($r['fone1']) ?></td>
                                    <td><?php echo str_to_format_cpf_cnpj($r['cnpj_cpf']) ?></td>
                                    <td><?php echo $r['apolice'] ?></td>
                                    <td><?php echo (dateSQLtoBR($r['efetivacao'])=='00/00/0000') ? "": dateSQLtoBR($r['efetivacao']) ?></td>

                                </tr>

                            <?php endforeach;?>
                          <tfoot>
                            <tr>
                                <th><center>Total Geral</center></th>
                                <th></th>
                                <th><?php echo $tot_vidas?></th>
                                <th></th>
                                <th><?php echo number_format($tot_valor, 2, ',', '.');?></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tfoot>
                        <?php endif;?>
                        </tbody>
                    </table>






                <?php endif;?>


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

<?php if (isset($show_filters)): ?>

    <script type="text/javascript">
        $(function(){
            $('#div-filtros').collapse();
             $.AdminBSB.leftSideBar.recuarMenu(true);

        });
    </script>
<?php endif;?>


<!--Filtros para relatório de pme-->

