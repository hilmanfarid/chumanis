<Page id="1" templateExtension="html" relativePath=".." fullRelativePath=".\admin.menu" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" useDesign="True" needGeneration="0" masterPage="../Designs/d01/MasterPage.ccp" wizardTheme="None" wizardThemeVersion="3.0">
	<Components>
		<Panel id="2" visible="True" generateDiv="False" name="Head" contentPlaceholder="Head">
			<Components/>
			<Events/>
			<Attributes/>
			<Features/>
		</Panel>
		<Panel id="3" visible="True" generateDiv="False" name="Content" contentPlaceholder="Content">
			<Components>
				<Record id="4" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="roleForm" connection="hrcon" dataSource="p_role" errorSummator="Error" allowCancel="True" recordDeleteConfirmation="True" buttonsType="button" wizardRecordKey="p_role_id" encryptPasswordField="False" wizardUseInterVariables="False" pkIsAutoincrement="True" wizardCaption="Role" wizardThemeApplyTo="Page" wizardFormMethod="post" wizardType="Record" changedCaptionRecord="True" recordDirection="Vertical" templatePageRecord="C:/Program Files (x86)/CodeChargeStudio5/Templates/Record/Dialog.ccp|ccsTemplate" recordAddTemplatePanel="False" PathID="ContentroleForm" returnPage="p_role_list.ccp" parameterTypeListName="ParameterTypeList" activeCollection="USQLParameters" customInsertType="SQL" activeTableType="p_role" customInsert="select * from f_crud_p_role
(null, 
'{code}',
{listing_no},
to_date('{valid_from}','dd-mon-yyyy'),
(case when '{valid_to}'='' or '{valid_to}' is null then null else to_date('{valid_to}','dd-mon-yyyy') end),
'{description}',
'{struser}',
'C')" customUpdateType="SQL" customUpdate="select * from f_crud_p_role
({p_role_id}, 
'{code}',
{listing_no},
to_date('{valid_from}','dd-mon-yyyy'),
(case when '{valid_to}'='' or '{valid_to}' is null then null else to_date('{valid_to}','dd-mon-yyyy') end),
'{description}',
'{struser}',
'U')" customDeleteType="SQL" customDelete="select * from f_crud_p_role
({p_role_id}, 
null,
null,
null,
null,
null,
'{struser}',
'D')" removeParameters="code">
					<Components>
						<Button id="5" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Add" PathID="ContentroleFormButton_Insert">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Button>
						<Button id="6" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Submit" PathID="ContentroleFormButton_Update">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Button>
						<Button id="7" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="Delete" PathID="ContentroleFormButton_Delete" removeParameters="p_role_id">
							<Components/>
							<Events>
								<Event name="OnClick" type="Client">
									<Actions>
										<Action actionName="Confirmation Message" actionCategory="General" id="8" message="Delete record?" eventType="Client"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</Button>
						<Button id="9" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardCaption="Cancel" PathID="ContentroleFormButton_Cancel">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Button>
						<TextBox id="10" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="code" fieldSource="code" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Code" caption="Role Code" required="True" unique="False" wizardSize="50" wizardMaxLength="64" PathID="ContentroleFormcode">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextArea id="12" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="description" fieldSource="description" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Description" caption="Description" required="False" unique="False" wizardSize="50" wizardMaxLength="250" PathID="ContentroleFormdescription">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextArea>
						<TextBox id="16" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="updated_by" fieldSource="updated_by" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Updated By" caption="Updated By" required="False" unique="False" wizardSize="32" wizardMaxLength="32" PathID="ContentroleFormupdated_by" defaultValue="CCGetUserLogin()">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<Hidden id="17" fieldSourceType="DBColumn" dataType="Float" name="p_role_id" PathID="ContentroleFormp_role_id" fieldSource="p_role_id">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Hidden>
						<TextBox id="19" visible="Yes" fieldSourceType="DBColumn" dataType="Float" name="listing_no" fieldSource="listing_no" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Code" caption="listing_no" required="True" unique="False" wizardSize="50" wizardMaxLength="64" PathID="ContentroleFormlisting_no">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextBox id="66" visible="Dynamic" fieldSourceType="DBColumn" dataType="Date" name="valid_from" fieldSource="valid_from" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Creation Date" caption="Awal Berlaku" required="False" format="dd-mmm-yyyy" unique="False" wizardSize="8" wizardMaxLength="100" PathID="ContentroleFormvalid_from" defaultValue="CurrentDate" generateDiv="False">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextBox id="14" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="created_by" fieldSource="created_by" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Created By" caption="Created By" required="False" unique="False" wizardSize="32" wizardMaxLength="32" PathID="ContentroleFormcreated_by" defaultValue="CCGetUserLogin()">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextBox id="13" visible="Dynamic" fieldSourceType="DBColumn" dataType="Date" name="creation_date" fieldSource="creation_date" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Creation Date" caption="Creation Date" required="False" format="dd-mmm-yyyy" unique="False" wizardSize="8" wizardMaxLength="100" PathID="ContentroleFormcreation_date" defaultValue="CurrentDate" generateDiv="False">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<TextBox id="15" visible="Dynamic" fieldSourceType="DBColumn" dataType="Date" name="updated_date" fieldSource="updated_date" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Updated Date" caption="Updated Date" required="False" format="dd-mmm-yyyy" unique="False" wizardSize="8" wizardMaxLength="100" PathID="ContentroleFormupdated_date" defaultValue="CurrentDate" generateDiv="False">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<Hidden id="68" fieldSourceType="DBColumn" dataType="Float" name="idmenulabel" PathID="ContentroleFormidmenulabel">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Hidden>
						<TextBox id="67" visible="Dynamic" fieldSourceType="DBColumn" dataType="Date" name="valid_to" fieldSource="valid_to" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardCaption="Creation Date" caption="Akhir Berlaku" required="False" format="dd-mmm-yyyy" unique="False" wizardSize="8" wizardMaxLength="100" PathID="ContentroleFormvalid_to" defaultValue="CurrentDate" generateDiv="False">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</TextBox>
						<DatePicker id="70" name="DatePicker_valid_to2" PathID="ContentroleFormDatePicker_valid_to2" control="valid_to" wizardDatePickerType="Image" wizardPicture="{CCS_PathToMasterPage}/Images/DatePicker.png">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</DatePicker>
						<DatePicker id="71" name="DatePicker_valid_from2" PathID="ContentroleFormDatePicker_valid_from2" control="valid_from" wizardDatePickerType="Image" wizardPicture="{CCS_PathToMasterPage}/Images/DatePicker.png">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</DatePicker>
					</Components>
					<Events/>
					<TableParameters>
						<TableParameter id="64" conditionType="Parameter" useIsNull="False" dataType="Float" field="p_role_id" logicOperator="And" parameterSource="p_role_id" parameterType="URL" searchConditionType="Equal"/>
					</TableParameters>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="63" posHeight="180" posLeft="147" posTop="10" posWidth="115" schemaName="chumanis" tableName="p_role"/>
					</JoinTables>
					<JoinLinks/>
					<Fields>
						<Field id="65" fieldName="*"/>
					</Fields>
					<PKFields/>
					<ISPParameters/>
					<ISQLParameters>
						<SQLParameter id="21" variable="code" dataType="Text" parameterType="Control" parameterSource="code"/>
						<SQLParameter id="23" variable="description" dataType="Text" parameterType="Control" parameterSource="description"/>
						<SQLParameter id="27" variable="struser" dataType="Text" parameterType="Session" parameterSource="UserName"/>
						<SQLParameter id="77" variable="valid_from" parameterType="Control" defaultValue="null" dataType="Date" DBFormat="dd-mmm-yyyy" format="dd-mmm-yyyy" parameterSource="valid_from"/>
						<SQLParameter id="78" variable="valid_to" parameterType="Control" defaultValue="null" dataType="Date" DBFormat="dd-mmm-yyyy" format="dd-mmm-yyyy" parameterSource="valid_to"/>
						<SQLParameter id="89" variable="listing_no" parameterType="Control" defaultValue="0" dataType="Integer" parameterSource="listing_no"/>
					</ISQLParameters>
					<IFormElements>
						<CustomParameter id="79" field="code" dataType="Text" parameterType="Control" parameterSource="code"/>
						<CustomParameter id="80" field="description" dataType="Text" parameterType="Control" parameterSource="description"/>
						<CustomParameter id="81" field="updated_by" dataType="Text" parameterType="Control" parameterSource="updated_by"/>
						<CustomParameter id="82" field="p_role_id" dataType="Float" parameterType="Control" parameterSource="p_role_id"/>
						<CustomParameter id="83" field="listing_no" dataType="Float" parameterType="Control" parameterSource="listing_no"/>
						<CustomParameter id="84" field="valid_from" dataType="Date" parameterType="Control" parameterSource="valid_from" format="dd-mmm-yyyy"/>
						<CustomParameter id="85" field="created_by" dataType="Text" parameterType="Control" parameterSource="created_by"/>
						<CustomParameter id="86" field="creation_date" dataType="Date" parameterType="Control" parameterSource="creation_date" format="dd-mmm-yyyy"/>
						<CustomParameter id="87" field="updated_date" dataType="Date" parameterType="Control" parameterSource="updated_date" format="dd-mmm-yyyy"/>
						<CustomParameter id="88" field="valid_to" dataType="Date" parameterType="Control" parameterSource="valid_to" format="dd-mmm-yyyy"/>
					</IFormElements>
					<USPParameters/>
					<USQLParameters>
						<SQLParameter id="39" variable="code" dataType="Text" parameterType="Control" parameterSource="code"/>
						<SQLParameter id="41" variable="description" dataType="Text" parameterType="Control" parameterSource="description"/>
						<SQLParameter id="46" variable="p_role_id" dataType="Float" parameterType="URL" parameterSource="p_role_id" defaultValue="0"/>
						<SQLParameter id="90" variable="struser" parameterType="Session" dataType="Text" parameterSource="UserName"/>
						<SQLParameter id="91" variable="listing_no" parameterType="Control" defaultValue="0" dataType="Integer" parameterSource="listing_no"/>
						<SQLParameter id="92" variable="valid_from" parameterType="Control" dataType="Date" DBFormat="dd-mmm-yyyy" format="dd-mmm-yyyy" parameterSource="valid_from" defaultValue="null"/>
						<SQLParameter id="93" variable="valid_to" parameterType="Control" dataType="Date" DBFormat="dd-mmm-yyyy" format="dd-mmm-yyyy" parameterSource="valid_to" defaultValue="null"/>
					</USQLParameters>
					<UConditions>
						<TableParameter id="47" conditionType="Parameter" useIsNull="False" field="p_role_id" dataType="Float" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="p_role_id"/>
					</UConditions>
					<UFormElements>
						<CustomParameter id="48" field="code" dataType="Text" parameterType="Control" parameterSource="code" omitIfEmpty="True"/>
						<CustomParameter id="50" field="description" dataType="Text" parameterType="Control" parameterSource="description" omitIfEmpty="True"/>
						<CustomParameter id="51" field="creation_date" dataType="Date" parameterType="Control" parameterSource="creation_date" format="dd-mmm-yyyy" omitIfEmpty="True"/>
						<CustomParameter id="52" field="created_by" dataType="Text" parameterType="Control" parameterSource="created_by" omitIfEmpty="True"/>
						<CustomParameter id="53" field="updated_date" dataType="Date" parameterType="Control" parameterSource="updated_date" format="dd-mmm-yyyy" omitIfEmpty="True"/>
						<CustomParameter id="54" field="updated_by" dataType="Text" parameterType="Control" parameterSource="updated_by" omitIfEmpty="True"/>
						<CustomParameter id="57" field="listing_no" dataType="Text" parameterType="Control" parameterSource="listing_no" omitIfEmpty="True"/>
						<CustomParameter id="75" field="valid_from" dataType="Date" parameterType="Control" parameterSource="valid_from" format="dd-mmm-yyyy" omitIfEmpty="True"/>
						<CustomParameter id="76" field="valid_to" dataType="Date" parameterType="Control" parameterSource="valid_to" format="dd-mmm-yyyy" omitIfEmpty="True"/>
					</UFormElements>
					<DSPParameters/>
					<DSQLParameters>
						<SQLParameter id="94" variable="p_role_id" parameterType="Control" defaultValue="0" dataType="Integer" parameterSource="p_role_id"/>
						<SQLParameter id="95" variable="struser" parameterType="Session" dataType="Text" parameterSource="UserName"/>
					</DSQLParameters>
					<DConditions>
						<TableParameter id="58" conditionType="Parameter" useIsNull="False" field="p_role_id" dataType="Float" parameterType="URL" searchConditionType="Equal" logicOperator="And" orderNumber="1" parameterSource="p_role_id"/>
					</DConditions>
					<SecurityGroups>
						<Group id="59" groupID="1" read="True" insert="True" update="True" delete="True"/>
					</SecurityGroups>
					<Attributes/>
					<Features/>
				</Record>
				<IncludePage id="69" name="NewPage1" PathID="ContentNewPage1" page="../admin/NewPage1.ccp">
					<Components/>
					<Events/>
					<Features/>
				</IncludePage>
			</Components>
			<Events/>
			<Attributes/>
			<Features/>
		</Panel>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="p_role_maint.php" forShow="True" url="p_role_maint.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
