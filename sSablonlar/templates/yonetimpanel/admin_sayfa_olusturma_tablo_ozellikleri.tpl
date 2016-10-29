{literal}
<style type="text/css">
<!--
.tdata {
	font-size: 10px;
	border:solid 1px silver;
	text-align:left;
}
.tlabel {
	font-size: 10px;
	font-weight:bold;
	border:solid 1px silver;
	text-align:left;
}
.cgizle{ display:none;}
.cgoster{ display:block;}
-->
</style>
<script>
	function goster_gizle(ob){
		obj=document.getElementById(ob);
		//alert(obj.className );
		if (obj.className =="cgizle tlabel")
			obj.className ="cgoster tlabel";
		else 	
			obj.className ="cgizle tlabel";
	}
</script>
{/literal}
{include file="admin_ust.tpl" title="Admin"}

	<center><b>TABLO ÖZELL&#304;KLER&#304;</b></center>	

	  <table width="100%" border="0" cellspacing="0" cellpadding="3" align="center">
	  	<tr class="tlabel">
        <th>&nbsp;</th>
        <th width="30">SIRA</th>
        <th width="100">KOLON ADI</th>
        <th>LABEL</th>
        <th>TIP</th>
        <th>MAKS.UZUNLUK</th>
        <th>DEFAULT</th>
        <th>NOT NULL</th>

        <th>PRIMARY KEY</th>
        <th>MULTIPLE KEY</th>
        <th>UNIQUE KEY</th>
        <th>NUMERIK</th>
        <th>BLOB</th>
        <th>UNSIGNED</th>
        <th>ZEROFILL</th>
        </tr>	
		<tr class="tlabel"><td  colspan="15" style="border-bottom:1px silver solid; height:1px;"></td></tr>
<form action="" method="post" name="form2" id="form2"><input name="tablo_ismi" type="hidden" value="{$tablo_ismi}" /><input name="s" type="hidden" value="{$s}" />
		{section name=m loop=$il}
		{strip}
		   <tr class="tlabel" bgcolor="{cycle values="#f2f3f3,#ffffff"}">
              <td width="10">[<span onclick="goster_gizle('gg_{$il[m].name}');" style="cursor:pointer;"><b>+</b></span>]</td>
			  <td width="30"><input class="tdata" type="text" name="sira_{$il[m].name}" id="id_{$il[m].name}" value="{$il[m].sira}" size="2" style="text-align:right"/></td>
			  <td width="100">{$il[m].name}({$il[m].field_type})</td>
			  <td><input class="tdata" type="text" name="label_{$il[m].name}" id="id_label_{$il[m].name}" value="{$il[m].name}" maxlength="64"/></td>
			  <td><select class="tdata"  name="type_{$il[m].name}" id="id_type_{$il[m].name}" >{html_options options=$il[m].ftype selected=$il[m].type}</select></td>

			  <td><input class="tdata" type="text" name="max_length_{$il[m].name}" id="id_max_length_{$il[m].name}" value="{$il[m].max_length}" maxlength="64" /></td>
			  <td><input class="tdata" type="text" name="def_{$il[m].name}" id="id_def_{$il[m].name}" value="{$il[m].def}" maxlength="64" /></td>

			  <td><select class="tdata"  name="not_null_{$il[m].name}" id="id_not_null_{$il[m].name}" >{html_options options=$il[m].yn selected=$il[m].not_null}</select></td>

			  <td><select class="tdata"  name="primary_key_{$il[m].name}" id="id_primary_key_{$il[m].name}" >{html_options options=$il[m].yn selected=$il[m].primary_key}</select></td>
			  <td><select class="tdata"  name="multiple_key_{$il[m].name}" id="id_multiple_key_{$il[m].name}" >{html_options options=$il[m].yn selected=$il[m].multiple_key}</select></td>

			  <td><select class="tdata"  name="unique_key_{$il[m].name}" id="id_unique_key_{$il[m].name}" >{html_options options=$il[m].yn selected=$il[m].unique_key}</select></td>
			  <td><select class="tdata"  name="numeric_{$il[m].name}" id="id_numeric_{$il[m].name}" >{html_options options=$il[m].yn selected=$il[m].numeric}</select></td>
			  <td><select class="tdata"  name="blob_{$il[m].name}" id="id_blob_{$il[m].name}" >{html_options options=$il[m].yn selected=$il[m].blob}</select></td>
			  <td><select class="tdata"  name="unsigned_{$il[m].name}" id="id_unsigned_{$il[m].name}" >{html_options options=$il[m].yn selected=$il[m].unsigned}</select></td>
			  <td><select class="tdata"  name="zerofill_{$il[m].name}" id="id_zerofill_{$il[m].name}" >{html_options options=$il[m].yn selected=$il[m].zerofill}</select></td>
		   </tr>
		   <tr bgcolor="#EFFFFF">
           	  <td colspan="3" valign="top" width="130"></td>
              <td colspan="12"><table id="gg_{$il[m].name}" bgcolor="#EFFFFF" class="cgizle tlabel"  cellspacing="0" cellpadding="0" border="0" >
              <tr><td valign="top"><table>
              					<tr><td>Description</td><td><textarea name="desc_{$il[m].name}" cols="50" rows="3" class="tdata" id="id_desc_{$il[m].name}"></textarea></td></tr>
              					<tr><td>Tooltip/Alt</td><td><textarea name="alt_{$il[m].name}" cols="50" rows="3" class="tdata" id="id_alt_{$il[m].name}"></textarea></td></tr>
                              </table></td>
			  <td colspan="3" valign="top"><table>
              					<tr><td>(JS)onblur</td><td><textarea name="onblur_{$il[m].name}" cols="50" rows="2" class="tdata" id="id_onblur_{$il[m].name}">{$il[m].frm_onblur}</textarea></td></tr>
              					<tr><td>(JS)onfocus</td><td><textarea name="onfocus_{$il[m].name}" cols="50" rows="2" class="tdata" id="id_onfocus_{$il[m].name}">{$il[m].frm_onfocus}</textarea></td></tr>
              					<tr><td>(JS)onkeypress</td><td><textarea name="onkeypress_{$il[m].name}" cols="50" rows="2" class="tdata" id="id_onkeypress_{$il[m].name}">{$il[m].frm_onkeypress}</textarea></td></tr>
              					<tr><td>(JS)onkeyup</td><td><textarea name="onkeyup_{$il[m].name}" cols="50" rows="2" class="tdata" id="id_onkeyup_{$il[m].name}">{$il[m].frm_onkeyup}</textarea></td></tr>
                              </table></td>
			  <td colspan="3" valign="top"><table>
              					<tr><td>Göster/Gizle</td><td><select class="tdata"  name="show_hide_{$il[m].name}" id="id_show_hide_{$il[m].name}" >{html_options options=$il[m].yn selected=$il[m].frm_show_hide}</select></td></tr>
              					<tr><td>class</td><td><input class="tdata" type="text" name="class_{$il[m].name}" id="id_class_{$il[m].name}" value="{$il[m].frm_class}" maxlength="64"/></td></tr>
              					<tr><td>readonly</td><td><select class="tdata"  name="readonly_{$il[m].name}" id="id_readonly_{$il[m].name}" >{html_options options=$il[m].yn selected=$il[m].frm_readonly}</select></td></tr>
              					<tr><td>disabled</td><td><select class="tdata"  name="disabled_{$il[m].name}" id="id_disabled_{$il[m].name}" >{html_options options=$il[m].yn selected=$il[m].frm_disabled}</select></td></tr>
                              </table></td>
              </table></td>
		   </tr>
		{/strip}
		{/section}
		<tr><td colspan=15><input type="submit" name="btnSayfaOlustur" value="Sayfa Olustur"/></td></tr>
</form>
	</table>

{include file="admin_alt.tpl"}
