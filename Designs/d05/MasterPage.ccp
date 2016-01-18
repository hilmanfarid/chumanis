<Page id="1" templateExtension="html" relativePath="..\.." fullRelativePath=".\Designs\d01" secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" needGeneration="0">
	<Components>
		<ContentPlaceholder id="2" name="Head" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="Head">
			<Components/>
			<Events/>
			<Features/>
		</ContentPlaceholder>
		<ContentPlaceholder id="3" name="Content" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="Content">
			<Components/>
			<Events/>
			<Features/>
		</ContentPlaceholder>
		<Label id="9" fieldSourceType="DBColumn" dataType="Text" html="True" generateSpan="False" name="lhMenu" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="lhMenu">
			<Components/>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="11"/>
					</Actions>
				</Event>
			</Events>
			<Attributes/>
			<Features/>
		</Label>
		<Label id="10" fieldSourceType="DBColumn" dataType="Text" html="True" generateSpan="False" name="llMenu" wizardTheme="None" wizardThemeType="File" wizardThemeVersion="3.0" PathID="llMenu">
			<Components/>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="12"/>
					</Actions>
				</Event>
			</Events>
			<Attributes/>
			<Features/>
		</Label>
		<Record id="13" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="DXX" actionPage="home" errorSummator="Error" wizardFormMethod="post" PathID="DXX" wizardOrientation="Vertical">
			<Components>
				<ListBox id="14" visible="Yes" fieldSourceType="DBColumn" sourceType="ListOfValues" dataType="Text" returnValueType="Number" name="design" wizardEmptyCaption="Select Value" PathID="DXXdesign" dataSource="d01;multicolor;d02;gray;d03;blue;d04;green;d05;orange" defaultValue="CCGetSession(&quot;design&quot;)">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
					<PKFields/>
					<Attributes/>
					<Features/>
				</ListBox>
				<Button id="15" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Search" PathID="DXXButton_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
			</Components>
			<Events/>
			<TableParameters/>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<PKFields/>
			<ISPParameters/>
			<ISQLParameters/>
			<IFormElements/>
			<USPParameters/>
			<USQLParameters/>
			<UConditions/>
			<UFormElements/>
			<DSPParameters/>
			<DSQLParameters/>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="MasterPage_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="MasterPage.php" forShow="True" url="MasterPage.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="OnInitializeView" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="8"/>
			</Actions>
		</Event>
	</Events>
</Page>
