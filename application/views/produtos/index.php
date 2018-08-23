<div class="body table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Dexcrição</th>

            </tr>
        </thead>
        <tbody>

            <?php
            if (isset($produtos) && is_array($produtos)) {
                foreach ($produtos as $prod) {
                    ?>
                    <tr>
                        
                        <td><?php echo $codigo?></td>
                        <td><?php echo $descricao?></td>
                        
                    </tr>
                <?php
                }
            } else {
                
            }
            ?>


        </tbody>
    </table>
</div>