<?php
//---------------------------------------------------------
//�Ƹ�ͨ��ʱ����֧������ʾ�����̻����մ��ĵ����п�������
//---------------------------------------------------------

require_once ("classes/PayRequestHandler.class.php");

/* �̻��� */
$bargainor_id = "1210936901";

/* ��Կ */
$key = "93854588e49b6691e735ad70fbd9262e";

/* ���ش����ַ */
$return_url = "http://localhost/tenpay/return_url.php";

//date_default_timezone_set(PRC);
$strDate = date("Ymd");
$strTime = date("His");

//4λ�����
$randNum = rand(1000, 9999);

//10λ���к�,�������е�����
$strReq = $strTime . $randNum;

/* �̼Ҷ�����,����������32λ��ȡǰ32λ���Ƹ�ֻͨ��¼�̼Ҷ����ţ�����֤Ψһ�� */
$sp_billno = $strReq;

/* �Ƹ�ͨ���׵��ţ�����Ϊ��10λ�̻���+8λʱ�䣨YYYYmmdd)+10λ��ˮ�� */
$transaction_id = $bargainor_id . $strDate . $strReq;

/* ��Ʒ�۸񣨰����˷ѣ����Է�Ϊ��λ */
$total_fee = "1";

/* ��Ʒ���� */
$desc = "�����ţ�" . $transaction_id;

/* ����֧��������� */
$reqHandler = new PayRequestHandler();
$reqHandler->init();
$reqHandler->setKey($key);

//----------------------------------------
//����֧������
//----------------------------------------
$reqHandler->setParameter("bargainor_id", $bargainor_id);			//�̻���
$reqHandler->setParameter("sp_billno", $sp_billno);					//�̻�������
$reqHandler->setParameter("transaction_id", $transaction_id);		//�Ƹ�ͨ���׵���
$reqHandler->setParameter("total_fee", $total_fee);					//��Ʒ�ܽ��,�Է�Ϊ��λ
$reqHandler->setParameter("return_url", $return_url);				//���ش����ַ
$reqHandler->setParameter("desc", "�����ţ�" . $transaction_id);	//��Ʒ����
$reqHandler->setParameter("bank_type", "1002");	//��Ʒ����

//�û�ip,���Ի���ʱ��Ҫ�����ip��������ʽ�����ټӴ˲���
$reqHandler->setParameter("spbill_create_ip", $_SERVER['REMOTE_ADDR']);

//�����URL
$reqUrl = $reqHandler->getRequestURL();

//debug��Ϣ
//$debugInfo = $reqHandler->getDebugInfo();

//echo "<br/>" . $reqUrl . "<br/>";
//echo "<br/>" . $debugInfo . "<br/>";

//�ض��򵽲Ƹ�֧ͨ��
//$reqHandler->doSend();


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�Ƹ�ͨ</title>
<style type="text/css">


body { margin: 0px; background-color:#FFFFFF; }
 .font_14{font-family:"Verdana","����";font-size:14px;color:#404040;line-height:20px; font-weight:bold;}
.font_15{font-family:"Verdana","����";font-size:12px;color:#404040;line-height:20px; font-weight:bold;}
.font_16{font-family:"Verdana","����";font-size:12px;color:#595959;line-height:20px; font-weight:100; }
</style>
</head>

<body>
<table width="865" border="0" cellpadding="0" cellspacing="0" align="center">
   <tr>
    <td height="10" colspan="2"></td>  
  </tr>
  <tr>
    <td colspan="2" >
	     <TABLE style="FONT-SIZE: 12px" cellSpacing=1 cellPadding=3 width=762 align=center bgColor=#D8D9DB border=0   >					  
			<tr>
				<td width="754" height="36" style="background:#F1F3F2"  >&nbsp;<img src="images/logo.gif"   />Ϊ���ṩ��������֧������<span style=" color:#868686">���Ƹ�ͨ����Ѷ���µ�����֧��ƽ̨��</span></td>
			</tr>
			<tr>
				<td height="36" style="background:#FFFFFF;  padding-left:20px ">
						<br /><input name="" type="radio" value="" style="vertical-align:top" />&nbsp;<img src="images/10.gif"  /><input name="" type="radio" value="" style="vertical-align:top"  />&nbsp;<img src="images//17.gif" /><input name="" type="radio" value="" style="vertical-align:top"  />&nbsp;<img src="images/2.gif" /><input name="" type="radio" value=""  style="vertical-align:top"  />&nbsp;<img src="images/1.gif" /><input name="" type="radio" value="" style="vertical-align:top"  />&nbsp;<img src="images/12.gif" /><br />
<br />
<input name="" type="radio" value="" style="vertical-align:top" />&nbsp;<img src="images/8.gif"  /><input name="" type="radio" value="" style="vertical-align:top"  />&nbsp;<img src="images/27.gif" /><input name="" type="radio" value="" style="vertical-align:top"  />&nbsp;<img src="images/11.gif" /><input name="" type="radio" value=""  style="vertical-align:top"  />&nbsp;<img src="images/3.gif" /><input name="" type="radio" value="" style="vertical-align:top"  />&nbsp;<img src="images/4.gif" />
<br />
<input name="" type="radio" value="" style="vertical-align:top" />&nbsp;<img src="images/7.gif"  /><input name="" type="radio" value="" style="vertical-align:top"  />&nbsp;<img src="images/6.gif" /><input name="" type="radio" value="" style="vertical-align:top"  />&nbsp;<img src="images/18.gif" /><input name="" type="radio" value=""  style="vertical-align:top"  />&nbsp;<img src="images/16.gif" /><input name="" type="radio" value="" style="vertical-align:top"  />&nbsp;<img src="images/5.gif" />
<br />
<input name="" type="radio" value=""  />&nbsp;&nbsp;�Ƹ�ͨ�˻�֧��<span style=" color:#868686">���Ƹ�ͨ�˻����֧����һ��֧ͨ����</span><br /><br /> </td>
			</tr>
        </TABLE>
	</td>  
  </tr>
  <tr>
    <td height="20" colspan="2"></td>  
  </tr>
  
</table>

</body>
</html>
