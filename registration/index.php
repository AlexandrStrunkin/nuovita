<?
    require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
    $APPLICATION->SetTitle("�����������");

   ?>
    <?$APPLICATION->IncludeFile(SITE_DIR."include/register_description.php", Array(), Array("MODE" => "html", "NAME" => GetMessage("REGISTER_INCLUDE_AREA"), ));?>
    <div class="wrap_main">
       <?$APPLICATION->IncludeComponent("bitrix:main.register", "registration_nuovita", Array(
	"USER_PROPERTY_NAME" => "",	// �������� ����� ���������������� �������
		"SEF_MODE" => "Y",
		"SHOW_FIELDS" => array(	// ����, ������� ���������� � �����
			0 => "EMAIL",
			1 => "NAME",
			2 => "SECOND_NAME",
			3 => "LAST_NAME",
		),
		"REQUIRED_FIELDS" => array(	// ����, ������������ ��� ����������
			0 => "EMAIL",
			1 => "NAME",
			2 => "LAST_NAME",
		),
		"AUTH" => "Y",	// ������������� ������������ �������������
		"USE_BACKURL" => "Y",	// ���������� ������������ �� �������� ������, ���� ��� ����
		"SUCCESS_PAGE" => "",	// �������� ��������� �����������
		"SET_TITLE" => "Y",	// ������������� ��������� ��������
		"USER_PROPERTY" => "",	// ���������� ���. ��������
		"SEF_FOLDER" => "/",
		"COMPONENT_TEMPLATE" => ".default"
	),
	false
);?>
     </div>
    <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");