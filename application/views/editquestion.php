<!-- TinyMCE -->
<?php
		 	if($this->config->item('editor')=="yes"){	
		 	?>
<script type="text/javascript" src="<?php echo base_url('/javascript/tiny_mce/tiny_mce.js');?>"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",

		// Theme options
		theme_advanced_buttons1 : "newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,visualblocks",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

	
		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		
	});
</script>
<!-- /TinyMCE -->
<?php
}
?>

<div id="container">
	<?php echo form_open('qbank/update/'.$questionBank['qid']);?>
	
	<h1>Edit Question  #<?=$questionBank['qid']?> (Subject: <select name="sid"><?php foreach($subjectName as $subject){ ?><option value="<?=$subject['sid']?>" <?php if($questionBank['sid']==$subject['sid']){ echo "selected";}?> ><?=$subject['subject_Name']?></option> <?php } ?></select>)
	<input type="hidden" name="osid" value="<?=$questionBank['sid']?>">
	<div style="float:right" >
	<?php echo anchor('qbank/',img('images/back.gif'));?> &nbsp;
	<?php echo anchor('qbank/view/'.$questionBank['qid'],img('images/view.png'));?>
	</div>
	
	</h1>

	<div id="body">
	
	<?php echo validation_errors(); ?>
	
	<code>
		<div>
			 <?php
		 		if($this->config->item('editor')=="yes"){	
		 		?>		
		 		<textarea id="elm1" name="question" rows="15" cols="80" style="width: 80%"><?=$questionBank['question']?></textarea>
			<?php
			}
			else
			{
			?>
			<textarea  name="question" rows="15" cols="80" style="width: 80%"><?=$questionBank['question']?></textarea>
			<?php
			}
			?>
		</div>
	
	
	
	</code>
	<?php $option=explode(',',$questionBank['options']); $i=0;
	foreach($option as $option){ ?>
	<table><tr><td style="width:18px;"><input type="radio" name="answer" <?php if($questionBank['answer']==$option){ 
	 echo 'checked';
	 }?> value="<?=$i?>" ></td><td><input type="text" name="option[]" value="<?=$option?>" ></td></tr></table>
	<?php $i+=1; } ?><input type="hidden" id=nop value="<?=$i?>">
	 
	 <table id="newOption"><tr><td></td><td></td></tr></table>
	 
	 
	 <table>
	 <tr><td style="width:18px;"></td><td><a href="javascript:addfield();">Add new option</a><br/></td></tr>
	 <tr><td style="width:18px;"></td><td><input type="submit" name="submit" value="Submit"></td></tr>
	 </table>
	 
	 
	 <br/><br/>
	 
	</form>
	</div>

	
</div>

