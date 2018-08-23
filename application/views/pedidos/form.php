<form method="post" action="<?php echo site_url('pedido/salvar') ?>">
    <div class="row clearfix">
        <div class="col-sm-12">

            <div class="form-group">
                <div class="form-line">
                    <label for="filial">Filial:</label>
                    <select name="filial">
                        <?php foreach ($filiais as $filial): ?>
                            <option value="<?php echo $filial['id'] ?>"><?php echo $filial['nome'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-line">
                    <label for="tipo">Tipo:</label>
                    <select name="tipo">
                        <option value="E">Entrada</option>
                        <option value="S">Saída</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="form-line">
                    <label for="produtos">Adicionar Produto:</label>
                    <select id="produtos" name="produtos">
                        <?php foreach ($produtos as $produto): ?>
                            <option value="<?php echo $produto['id'] ?>" descricao="<?php echo $produto['descricao'] ?>"><?php echo $produto['descricao'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <a class="btn btn-success" id="bt-add-produto">Adicionar</a>
                </div>


            </div>

            <div class="body table-responsive">
                <table class="table" id="tbprodutos">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Descrição</th>
                            <th>Quantidade</th>
                        </tr>
                    </thead>
                    <tbody id="lista-produtos">
                        
                    </tbody>
                </table>
            </div>

        </div>
        
        <input type="submit" name="enviar" value="Enviar">
    </div>
</form>

<script>

    $('#bt-add-produto').on('click', function(){
    var codigo = $('#produtos').val();
    var descricao = $('#produtos option:selected').text();
    var html_ = '<tr><td>'+codigo+'<input type="hidden" name="produtos[]" value="'+codigo+'"></td><td>'+descricao+'</td><td><input type="text" value="1" name="quantidades[]"></td></tr>';
        $('#tbprodutos').find('tbody').append(html_);
        
        });
    
</script>