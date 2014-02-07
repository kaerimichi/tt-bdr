<div id="modalEditarAtividade" class="modal hide fade" tabindex="-1" role="dialog" aria-hidden="true">

  <div class="modal-header">

    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

    <h3>Editar Atividade</h3>

  </div>

  <div class="modal-body">

    <table class="formulario">

      <tr>

        <td>Título <span style="color: red;">*</span></td>
        <td><input name="tituloAtividade" type="text" value="<?=$tituloAtividade?>"></td>

      </tr>

      <tr>

        <td>Descrição</td>
        <td><textarea name="descricaoAtividade"><?=$descricaoAtividade?></textarea></td>

      </tr>

    </table>

  </div>

  <div class="modal-footer">

    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
    <button class="btn btn-primary" onclick="salvarAtividade('<?=$idAtividade?>')">OK</button>

  </div>

</div>