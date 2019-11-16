<img alt=" " src="http://mobilegateway.in:8080/sendsms/bulksms?username=ggg-trice&password=12345&type=0&dlr=1&destination=<?=$mobileNo;?>&source=022751&message=<?=$message;?>"/>
<?PHP
if(isset($page)){
?>
<script type="text/javascript">
window.location = "<?= site_url($page); ?>";
</script>
<?PHP
}
?>

