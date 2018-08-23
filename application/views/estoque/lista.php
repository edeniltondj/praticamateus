 <div class="form-group">
                <div class="form-line">
                    <label for="filial">Filial:</label>
                    <select name="filial">
                        <?php foreach ($filiais as $filial): ?>
                            <option value="<?php echo $filial['id'] ?>"><?php echo $filial['nome'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
               
            </div>

<div class="body table-responsive">
    <table class="table" id="tbestoque">
        <thead>
            <tr>
                <th>Produto</th>
                <th>Quantidade</th>
            </tr>
        </thead>
        <tbody id="lista-pedidos">
            <?php foreach ($estoques as $estoque): ?>
            <tr>
                <td><?php echo $estoque['descricao']?></td>
                <td><?php echo $estoque['quantidade_disponivel']?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>