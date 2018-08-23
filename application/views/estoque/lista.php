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
                        <option value="0">Entrada</option>
                        <option value="1">Saída</option>
                    </select>
                </div>
            </div>

<div class="body table-responsive">
    <table class="table" id="tbestoque">
        <thead>
            <tr>
                <th>Descrição</th>
                <th>Tipo</th>
            </tr>
        </thead>
        <tbody id="lista-pedidos">

        </tbody>
    </table>
</div>