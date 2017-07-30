/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50547
Source Host           : localhost:3306
Source Database       : efan_admin

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2017-07-30 15:36:23
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for efan_audition
-- ----------------------------
DROP TABLE IF EXISTS `efan_audition`;
CREATE TABLE `efan_audition` (
  `id` int(4) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `uid` int(4) NOT NULL COMMENT 'recruit表中的主键id',
  `auditiontime` varchar(11) NOT NULL COMMENT '面试的时间',
  `rotation` int(1) NOT NULL DEFAULT '1' COMMENT '当前进行到的轮次',
  `message` int(2) NOT NULL COMMENT '发送短信的情况\r\n0-未发送\r\n11-一轮短信发送成功\r\n10-一轮短信发送失败\r\n21-二轮短信发送成功\r\n20-二轮短信发送失败\r\n31-三轮短信发送成功\r\n32-三轮短信发送失败\r\n41-地主约谈短信发送成功\r\n42-地主约谈短信发送失败',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of efan_audition
-- ----------------------------
INSERT INTO `efan_audition` VALUES ('1', '5', '1472715000', '1', '0');

-- ----------------------------
-- Table structure for efan_auth_group_access
-- ----------------------------
DROP TABLE IF EXISTS `efan_auth_group_access`;
CREATE TABLE `efan_auth_group_access` (
  `uid` int(10) unsigned NOT NULL COMMENT '用户id',
  `group_id` mediumint(8) unsigned NOT NULL COMMENT '用户组id',
  PRIMARY KEY (`uid`,`group_id`),
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of efan_auth_group_access
-- ----------------------------
INSERT INTO `efan_auth_group_access` VALUES ('6', '6');

-- ----------------------------
-- Table structure for efan_auth_group_module
-- ----------------------------
DROP TABLE IF EXISTS `efan_auth_group_module`;
CREATE TABLE `efan_auth_group_module` (
  `permision` int(2) NOT NULL COMMENT '角色id',
  `module_key` varchar(50) NOT NULL COMMENT '系统模块id',
  PRIMARY KEY (`permision`,`module_key`),
  UNIQUE KEY `index_role_system` (`permision`,`module_key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of efan_auth_group_module
-- ----------------------------
INSERT INTO `efan_auth_group_module` VALUES ('1', 'CREATIVECLUB');
INSERT INTO `efan_auth_group_module` VALUES ('1', 'CREATIVECLUBLIST');
INSERT INTO `efan_auth_group_module` VALUES ('1', 'CREATIVECLUBLISTREPLY');
INSERT INTO `efan_auth_group_module` VALUES ('1', 'CREATIVECLUBLISTREPLYDELETE');
INSERT INTO `efan_auth_group_module` VALUES ('1', 'CREATIVECLUBLISTREPLYDISCUSS');
INSERT INTO `efan_auth_group_module` VALUES ('1', 'CREATIVECLUBLISTREPLYREPLY');
INSERT INTO `efan_auth_group_module` VALUES ('1', 'CREATIVECLUBLISTREPLYRETURN');
INSERT INTO `efan_auth_group_module` VALUES ('1', 'INFORMATION');
INSERT INTO `efan_auth_group_module` VALUES ('1', 'INFORMATIONBUG');
INSERT INTO `efan_auth_group_module` VALUES ('1', 'INFORMATIONBUGSUBMIT');
INSERT INTO `efan_auth_group_module` VALUES ('1', 'INFORMATIONCHANGEPASSWORD');
INSERT INTO `efan_auth_group_module` VALUES ('1', 'INFORMATIONCHANGEPASSWORDSUBMIT');
INSERT INTO `efan_auth_group_module` VALUES ('1', 'INFORMATIONLOGINOUT');
INSERT INTO `efan_auth_group_module` VALUES ('1', 'INFORMATIONUSER');
INSERT INTO `efan_auth_group_module` VALUES ('1', 'INFORMATIONUSERSUBMIT');
INSERT INTO `efan_auth_group_module` VALUES ('1', 'MOBILE');
INSERT INTO `efan_auth_group_module` VALUES ('1', 'MOBILECREATIVE');
INSERT INTO `efan_auth_group_module` VALUES ('1', 'MOBILECREATIVESUBMIT');
INSERT INTO `efan_auth_group_module` VALUES ('1', 'MOBILELIST');
INSERT INTO `efan_auth_group_module` VALUES ('1', 'MOBILELISTDELETE');
INSERT INTO `efan_auth_group_module` VALUES ('1', 'MOBILELISTEDIT');
INSERT INTO `efan_auth_group_module` VALUES ('1', 'MOBILELISTEDITSUBMIT');
INSERT INTO `efan_auth_group_module` VALUES ('1', 'MOBILELISTLOOK');
INSERT INTO `efan_auth_group_module` VALUES ('1', 'TEAMDAILY');
INSERT INTO `efan_auth_group_module` VALUES ('1', 'TEAMDAILYLIST');
INSERT INTO `efan_auth_group_module` VALUES ('1', 'TEAMDAILYLISTLOOK');
INSERT INTO `efan_auth_group_module` VALUES ('1', 'TEAMDAILYLISTUPLOAD');
INSERT INTO `efan_auth_group_module` VALUES ('1', 'TEAMDAILYNEW');
INSERT INTO `efan_auth_group_module` VALUES ('1', 'TEAMDAILYOTHER');
INSERT INTO `efan_auth_group_module` VALUES ('1', 'TEAMDAILYOTHERSUBMIT');
INSERT INTO `efan_auth_group_module` VALUES ('1', 'TEAMDAILYSUBMIT');
INSERT INTO `efan_auth_group_module` VALUES ('1', 'WELCOMEINDEX');
INSERT INTO `efan_auth_group_module` VALUES ('1', 'WELCOMEINDEXNOTICE');
INSERT INTO `efan_auth_group_module` VALUES ('2', 'MOBILESCORE');
INSERT INTO `efan_auth_group_module` VALUES ('2', 'MOBILESCORESCORE');
INSERT INTO `efan_auth_group_module` VALUES ('2', 'MOBILESCORESCORESUBMIT');
INSERT INTO `efan_auth_group_module` VALUES ('3', 'CREATIVECLUBADMIN');
INSERT INTO `efan_auth_group_module` VALUES ('3', 'CREATIVECLUBADMINCLOSE');
INSERT INTO `efan_auth_group_module` VALUES ('3', 'CREATIVECLUBADMINCOUNTNO');
INSERT INTO `efan_auth_group_module` VALUES ('3', 'CREATIVECLUBADMINDELETE');
INSERT INTO `efan_auth_group_module` VALUES ('3', 'CREATIVECLUBADMINDOWNLOAD');
INSERT INTO `efan_auth_group_module` VALUES ('3', 'CREATIVECLUBADMINEDIT');
INSERT INTO `efan_auth_group_module` VALUES ('3', 'CREATIVECLUBADMINEDITEDIT');
INSERT INTO `efan_auth_group_module` VALUES ('3', 'CREATIVECLUBADMINEDITFINDUID');
INSERT INTO `efan_auth_group_module` VALUES ('3', 'CREATIVECLUBADMINGROUP');
INSERT INTO `efan_auth_group_module` VALUES ('3', 'CREATIVECLUBADMINGROUPSUBMIT');
INSERT INTO `efan_auth_group_module` VALUES ('3', 'CREATIVECLUBADMINLEADINGIN');
INSERT INTO `efan_auth_group_module` VALUES ('3', 'CREATIVECLUBADMINOPEN');
INSERT INTO `efan_auth_group_module` VALUES ('3', 'CREATIVECLUBADMINPDF');
INSERT INTO `efan_auth_group_module` VALUES ('3', 'CREATIVECLUBLISTEDIT');
INSERT INTO `efan_auth_group_module` VALUES ('3', 'CREATIVECLUBLISTEDITSUBMIT');
INSERT INTO `efan_auth_group_module` VALUES ('3', 'CREATIVECLUBLISTREPLYEDIT');
INSERT INTO `efan_auth_group_module` VALUES ('3', 'CREATIVECLUBLISTREPLYEDITFINDUID');
INSERT INTO `efan_auth_group_module` VALUES ('3', 'CREATIVECLUBLISTREPLYEDITSUBMIT');
INSERT INTO `efan_auth_group_module` VALUES ('3', 'CREATIVECLUBNEW');
INSERT INTO `efan_auth_group_module` VALUES ('3', 'CREATIVECLUBNEWFINDUID');
INSERT INTO `efan_auth_group_module` VALUES ('3', 'CREATIVECLUBNEWSUBMIT');
INSERT INTO `efan_auth_group_module` VALUES ('5', 'MOBIELADMINSUBMITTIMENEWSUBMIT');
INSERT INTO `efan_auth_group_module` VALUES ('5', 'MOBILEADMIN');
INSERT INTO `efan_auth_group_module` VALUES ('5', 'MOBILEADMINDELETE');
INSERT INTO `efan_auth_group_module` VALUES ('5', 'MOBILEADMINEDIT');
INSERT INTO `efan_auth_group_module` VALUES ('5', 'MOBILEADMINEDITSUBMIT');
INSERT INTO `efan_auth_group_module` VALUES ('5', 'MOBILEADMINGROUPLIST');
INSERT INTO `efan_auth_group_module` VALUES ('5', 'MOBILEADMINGROUPLISTDELETE');
INSERT INTO `efan_auth_group_module` VALUES ('5', 'MOBILEADMINGROUPLISTEDIT');
INSERT INTO `efan_auth_group_module` VALUES ('5', 'MOBILEADMINGROUPLISTEDITSUBMIT');
INSERT INTO `efan_auth_group_module` VALUES ('5', 'MOBILEADMINGROUPLISTLOCK');
INSERT INTO `efan_auth_group_module` VALUES ('5', 'MOBILEADMINGROUPLISTNEW');
INSERT INTO `efan_auth_group_module` VALUES ('5', 'MOBILEADMINGROUPLISTNEWSUBMIT');
INSERT INTO `efan_auth_group_module` VALUES ('5', 'MOBILEADMINGROUPLISTUNLOCK');
INSERT INTO `efan_auth_group_module` VALUES ('5', 'MOBILEADMINSUBMITTIME');
INSERT INTO `efan_auth_group_module` VALUES ('5', 'MOBILEADMINSUBMITTIMEDELETE');
INSERT INTO `efan_auth_group_module` VALUES ('5', 'MOBILEADMINSUBMITTIMEEDIT');
INSERT INTO `efan_auth_group_module` VALUES ('5', 'MOBILEADMINSUBMITTIMEEDITSUBMIT');
INSERT INTO `efan_auth_group_module` VALUES ('5', 'MOBILEADMINSUBMITTIMENEW');
INSERT INTO `efan_auth_group_module` VALUES ('5', 'MOBILEADMINUPLOADLEADER');
INSERT INTO `efan_auth_group_module` VALUES ('8', 'RECRUIT');
INSERT INTO `efan_auth_group_module` VALUES ('8', 'RECRUITCHANGE');
INSERT INTO `efan_auth_group_module` VALUES ('8', 'RECRUITINDEX');
INSERT INTO `efan_auth_group_module` VALUES ('8', 'RECRUITVIEW');
INSERT INTO `efan_auth_group_module` VALUES ('9', 'AUDITION');
INSERT INTO `efan_auth_group_module` VALUES ('9', 'AUDITIONADD');
INSERT INTO `efan_auth_group_module` VALUES ('9', 'AUDITIONEDIT');
INSERT INTO `efan_auth_group_module` VALUES ('9', 'AUDITIONEDITSUBMIT');
INSERT INTO `efan_auth_group_module` VALUES ('9', 'AUDITIONIN');
INSERT INTO `efan_auth_group_module` VALUES ('9', 'AUDITIONINTERIM');
INSERT INTO `efan_auth_group_module` VALUES ('9', 'AUDITIONLAST');
INSERT INTO `efan_auth_group_module` VALUES ('9', 'AUDITIONNEXT');
INSERT INTO `efan_auth_group_module` VALUES ('9', 'AUDITIONOUT');
INSERT INTO `efan_auth_group_module` VALUES ('9', 'AUDITIONROTATION');
INSERT INTO `efan_auth_group_module` VALUES ('9', 'AUDITIONSENDMESSAGE');
INSERT INTO `efan_auth_group_module` VALUES ('9', 'AUDITIONTIME');
INSERT INTO `efan_auth_group_module` VALUES ('9', 'AUDITIONTIMESUBMIT');
INSERT INTO `efan_auth_group_module` VALUES ('9', 'RECRUITADMIN');
INSERT INTO `efan_auth_group_module` VALUES ('9', 'RECRUITADMINNEW');
INSERT INTO `efan_auth_group_module` VALUES ('9', 'RECRUITADMINNEWSUBMIT');
INSERT INTO `efan_auth_group_module` VALUES ('9', 'SYSTEM');
INSERT INTO `efan_auth_group_module` VALUES ('9', 'SYSTEMMAJOREDIT');
INSERT INTO `efan_auth_group_module` VALUES ('9', 'SYSTEMMAJORINDEX');
INSERT INTO `efan_auth_group_module` VALUES ('9', 'SYSTEMMAJORNEW');
INSERT INTO `efan_auth_group_module` VALUES ('9', 'SYSTEMMAJORNEWSUBMIT');
INSERT INTO `efan_auth_group_module` VALUES ('9', 'USERCHANGEPERMISION');
INSERT INTO `efan_auth_group_module` VALUES ('9', 'USERDELETE');
INSERT INTO `efan_auth_group_module` VALUES ('9', 'USERDISLIMITLOGIN');
INSERT INTO `efan_auth_group_module` VALUES ('9', 'USEREDIT');
INSERT INTO `efan_auth_group_module` VALUES ('9', 'USEREDITSUBMIT');
INSERT INTO `efan_auth_group_module` VALUES ('9', 'USERINFORMATION');
INSERT INTO `efan_auth_group_module` VALUES ('9', 'USERINTERIMPERMISION');
INSERT INTO `efan_auth_group_module` VALUES ('9', 'USERINTERIMPERMISIONDELETE');
INSERT INTO `efan_auth_group_module` VALUES ('9', 'USERINTERIMPERMISIONEDIT');
INSERT INTO `efan_auth_group_module` VALUES ('9', 'USERINTERIMPERMISIONEDITSUBMIT');
INSERT INTO `efan_auth_group_module` VALUES ('9', 'USERINTERIMPERMISIONNEW');
INSERT INTO `efan_auth_group_module` VALUES ('9', 'USERINTERIMPERMISIONNEWSUBMIT');
INSERT INTO `efan_auth_group_module` VALUES ('9', 'USERLEADINGIN');
INSERT INTO `efan_auth_group_module` VALUES ('9', 'USERLEADINGINSUBMIT');
INSERT INTO `efan_auth_group_module` VALUES ('9', 'USERLIMITLOGIN');
INSERT INTO `efan_auth_group_module` VALUES ('9', 'USERLIST');
INSERT INTO `efan_auth_group_module` VALUES ('9', 'USERMESSAGE');
INSERT INTO `efan_auth_group_module` VALUES ('9', 'USERMESSAGESEND');
INSERT INTO `efan_auth_group_module` VALUES ('9', 'USERNEW');
INSERT INTO `efan_auth_group_module` VALUES ('9', 'USERNEWSUBMIT');
INSERT INTO `efan_auth_group_module` VALUES ('9', 'USERRESETPASSWORLD');
INSERT INTO `efan_auth_group_module` VALUES ('9', 'USERTEMPLEDOWNLOAD');
INSERT INTO `efan_auth_group_module` VALUES ('9', 'WELCOMEINDEXNOTICEDELETE');
INSERT INTO `efan_auth_group_module` VALUES ('9', 'WELCOMEINDEXNOTICEDISIMPORTANT');
INSERT INTO `efan_auth_group_module` VALUES ('9', 'WELCOMEINDEXNOTICEEDIT');
INSERT INTO `efan_auth_group_module` VALUES ('9', 'WELCOMEINDEXNOTICEEDITSUBMIT');
INSERT INTO `efan_auth_group_module` VALUES ('9', 'WELCOMEINDEXNOTICEIMPORTANT');
INSERT INTO `efan_auth_group_module` VALUES ('9', 'WELCOMEINDEXNOTICENEW');
INSERT INTO `efan_auth_group_module` VALUES ('9', 'WELCOMEINDEXNOTICENEWSUBMIT');
INSERT INTO `efan_auth_group_module` VALUES ('10', 'MOBILELEADER');
INSERT INTO `efan_auth_group_module` VALUES ('10', 'MOBILELEADERCHANGE');
INSERT INTO `efan_auth_group_module` VALUES ('10', 'MOBILELEADERCHANGESUBMIT');
INSERT INTO `efan_auth_group_module` VALUES ('10', 'TEAMDAILYADMIN');
INSERT INTO `efan_auth_group_module` VALUES ('10', 'TEAMDAILYADMINLOOK');
INSERT INTO `efan_auth_group_module` VALUES ('10', 'TEAMDAILYADMINMAKE');

-- ----------------------------
-- Table structure for efan_college_major
-- ----------------------------
DROP TABLE IF EXISTS `efan_college_major`;
CREATE TABLE `efan_college_major` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `cid` int(3) NOT NULL,
  `title` varchar(99) NOT NULL COMMENT '学院',
  `class` varchar(99) NOT NULL COMMENT '专业',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of efan_college_major
-- ----------------------------
INSERT INTO `efan_college_major` VALUES ('1', '0', '机械工程与自动化学院', '');
INSERT INTO `efan_college_major` VALUES ('2', '0', '材料科学与工程学院', '');
INSERT INTO `efan_college_major` VALUES ('3', '0', '电气工程学院', '');
INSERT INTO `efan_college_major` VALUES ('4', '0', '电子与信息工程学院', '');
INSERT INTO `efan_college_major` VALUES ('5', '0', '土木建筑工程学院', '');
INSERT INTO `efan_college_major` VALUES ('6', '0', '艺术设计与建筑学院', '');
INSERT INTO `efan_college_major` VALUES ('7', '0', '管理学院', '');
INSERT INTO `efan_college_major` VALUES ('8', '0', '外国语学院', '');
INSERT INTO `efan_college_major` VALUES ('9', '0', '理学院', '');
INSERT INTO `efan_college_major` VALUES ('10', '0', '文化传媒学院', '');
INSERT INTO `efan_college_major` VALUES ('11', '0', '汽车与交通工程学院', '');
INSERT INTO `efan_college_major` VALUES ('12', '0', '软件学院', '');
INSERT INTO `efan_college_major` VALUES ('13', '0', '新能源学院', '');
INSERT INTO `efan_college_major` VALUES ('14', '0', '化学与环境工程学院', '');
INSERT INTO `efan_college_major` VALUES ('15', '0', '经济学院', '');
INSERT INTO `efan_college_major` VALUES ('16', '1', '机械电子工程', '机电');
INSERT INTO `efan_college_major` VALUES ('17', '1', '机械设计制造及其自动化(机械设计及其自动化方向)', '机设');
INSERT INTO `efan_college_major` VALUES ('18', '1', '机械设计制造及其自动化(机械制造及其自动化方向)', '机制');
INSERT INTO `efan_college_major` VALUES ('19', '1', '过程装备与控制工程', '过程');
INSERT INTO `efan_college_major` VALUES ('20', '1', '工业工程', '工业工程');
INSERT INTO `efan_college_major` VALUES ('21', '2', '材料物理', '材物');
INSERT INTO `efan_college_major` VALUES ('22', '2', '材料科学与工程', '材料');
INSERT INTO `efan_college_major` VALUES ('23', '2', '材料成型及控制工程', '材成');
INSERT INTO `efan_college_major` VALUES ('24', '2', '焊接技术与工程专业', '焊接');
INSERT INTO `efan_college_major` VALUES ('25', '3', '测控技术与仪器', '测控');
INSERT INTO `efan_college_major` VALUES ('26', '3', '自动化', '自动化');
INSERT INTO `efan_college_major` VALUES ('27', '3', '电气工程及其自动化', '电气');
INSERT INTO `efan_college_major` VALUES ('28', '4', '电子信息工程', '电子');
INSERT INTO `efan_college_major` VALUES ('29', '4', '通信工程', '通信');
INSERT INTO `efan_college_major` VALUES ('30', '4', '计算机科学与技术', '计算机');
INSERT INTO `efan_college_major` VALUES ('31', '4', '软件工程', '软件');
INSERT INTO `efan_college_major` VALUES ('32', '4', '网络工程', '网络');
INSERT INTO `efan_college_major` VALUES ('33', '4', '物联网工程', '物联网');
INSERT INTO `efan_college_major` VALUES ('34', '5', '土木工程专业(建筑工程方向）', '建筑');
INSERT INTO `efan_college_major` VALUES ('35', '5', '土木工程专业(道桥工程方向）', '道桥');
INSERT INTO `efan_college_major` VALUES ('36', '5', '建筑环境与能源应用工程', '建环');
INSERT INTO `efan_college_major` VALUES ('37', '5', '给排水科学与工程', '给排水');
INSERT INTO `efan_college_major` VALUES ('38', '6', '建筑学', '建筑学');
INSERT INTO `efan_college_major` VALUES ('39', '6', '产品设计', '产品');
INSERT INTO `efan_college_major` VALUES ('40', '6', '视觉传达设计', '视传');
INSERT INTO `efan_college_major` VALUES ('41', '6', '环境设计', '环境设计');
INSERT INTO `efan_college_major` VALUES ('42', '6', '数字媒体艺术', '数媒');
INSERT INTO `efan_college_major` VALUES ('43', '6', '风景园林', '园林');
INSERT INTO `efan_college_major` VALUES ('44', '6', '服装设计与工程', '服装');
INSERT INTO `efan_college_major` VALUES ('45', '7', '工程管理', '工程');
INSERT INTO `efan_college_major` VALUES ('46', '7', '工程造价', '造价');
INSERT INTO `efan_college_major` VALUES ('47', '7', '信息管理与信息系统', '信管');
INSERT INTO `efan_college_major` VALUES ('48', '7', '市场营销', '营销');
INSERT INTO `efan_college_major` VALUES ('49', '7', '房地产开发与管理', '房管');
INSERT INTO `efan_college_major` VALUES ('50', '7', '会计学', '会计');
INSERT INTO `efan_college_major` VALUES ('51', '8', '英语', '');
INSERT INTO `efan_college_major` VALUES ('52', '8', '日语', '');
INSERT INTO `efan_college_major` VALUES ('53', '9', '信息与计算科学', '计算');
INSERT INTO `efan_college_major` VALUES ('54', '10', '广告学', '广告');
INSERT INTO `efan_college_major` VALUES ('55', '10', '传播学', '传播');
INSERT INTO `efan_college_major` VALUES ('56', '11', '车辆工程', '车辆');
INSERT INTO `efan_college_major` VALUES ('57', '11', '交通工程', '交工');
INSERT INTO `efan_college_major` VALUES ('58', '11', '交通运输', '交运');
INSERT INTO `efan_college_major` VALUES ('59', '11', '物流工程', '物流');
INSERT INTO `efan_college_major` VALUES ('60', '11', '汽车服务工程', '汽服');
INSERT INTO `efan_college_major` VALUES ('61', '13', '车辆工程（新能源汽车工程方向）', '车辆(新能源)');
INSERT INTO `efan_college_major` VALUES ('62', '13', '材料物理（光电材料与器件方向）', '光电');
INSERT INTO `efan_college_major` VALUES ('63', '13', '电气工程及其自动化（光伏应用技术方向）', '(新)电气');
INSERT INTO `efan_college_major` VALUES ('64', '13', '建筑环境与能源应用工程（低碳建筑技术与工程方向）', '建环(低碳)');
INSERT INTO `efan_college_major` VALUES ('65', '14', '化学工程与工艺', '化工');
INSERT INTO `efan_college_major` VALUES ('66', '14', '应用化学', '应化');
INSERT INTO `efan_college_major` VALUES ('67', '14', '环境工程', '环工');
INSERT INTO `efan_college_major` VALUES ('68', '14', '环境科学', '环科');
INSERT INTO `efan_college_major` VALUES ('69', '15', '工商管理', '工商');
INSERT INTO `efan_college_major` VALUES ('70', '15', '经济学', '经济');
INSERT INTO `efan_college_major` VALUES ('71', '15', '金融学', '金融');
INSERT INTO `efan_college_major` VALUES ('72', '15', '经济统计学', '统计');
INSERT INTO `efan_college_major` VALUES ('73', '15', '国际经济与贸易', '国贸');
INSERT INTO `efan_college_major` VALUES ('74', '1', '机械设计制造及其自动化', '机械');

-- ----------------------------
-- Table structure for efan_creative
-- ----------------------------
DROP TABLE IF EXISTS `efan_creative`;
CREATE TABLE `efan_creative` (
  `id` int(5) NOT NULL AUTO_INCREMENT COMMENT '主键，自动增长',
  `uid` int(3) NOT NULL COMMENT '团队编号',
  `submittime` varchar(11) NOT NULL COMMENT '提交创意时间',
  `creativetitle` longtext NOT NULL COMMENT '创意标题',
  `group` int(2) NOT NULL,
  `creative` longtext NOT NULL COMMENT '创意内容',
  `state` int(1) NOT NULL DEFAULT '0' COMMENT '是否允许回复，1-允许回复，0-不允许回复',
  `zentaostate` int(1) NOT NULL DEFAULT '0' COMMENT '是否同步到禅道，1-已经同步到禅道，0,-未同步到禅道',
  `pdfurl` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of efan_creative
-- ----------------------------
INSERT INTO `efan_creative` VALUES ('2', '18', '1494952049', '42432432', '2', '<p>&lt;p&gt;111111&lt;/p&gt;&lt;p style=&quot;line-height: 16px;&quot;&gt;&lt;img style=&quot;vertical-align: middle; margin-right: 2px;&quot; src=&quot;http://localhost/efan/Public/assets/ueditor/dialogs/attachment/fileTypeImages/icon_pdf.gif&quot;/&gt;&lt;a style=&quot;font-size:12px; color:#0066cc;&quot; href=&quot;/ueditor/php/upload/file/20170511/1494517163136802.pdf&quot; title=&quot;1494517163136802.pdf&quot;&gt;1494517163136802.pdf&lt;/a&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;</p>', '0', '0', null);
INSERT INTO `efan_creative` VALUES ('3', '18', '1494953149', '1233', '1', '&lt;p&gt;1231231232131231&lt;/p&gt;&lt;p style=&quot;line-height: 16px;&quot;&gt;&lt;img style=&quot;vertical-align: middle; margin-right: 2px;&quot; src=&quot;http://localhost/efan/Public/assets/ueditor/dialogs/attachment/fileTypeImages/icon_pdf.gif&quot;/&gt;&lt;a style=&quot;font-size:12px; color:#0066cc;&quot; href=&quot;/ueditor/php/upload/file/20170511/1494517163136802.pdf&quot; title=&quot;1494517163136802.pdf&quot;&gt;1494517163136802.pdf&lt;/a&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', '0', '0', null);
INSERT INTO `efan_creative` VALUES ('4', '18', '1495007132', '134142342', '2', '&lt;p style=&quot;line-height: 16px;&quot;&gt;&lt;img style=&quot;vertical-align: middle; margin-right: 2px;&quot; src=&quot;http://localhost/efan/Public/assets/ueditor/dialogs/attachment/fileTypeImages/icon_txt.gif&quot;/&gt;&lt;a style=&quot;font-size:12px; color:#0066cc;&quot; href=&quot;/ueditor/php/upload/file/20170511/1494514336617290.txt&quot; title=&quot;1494514336617290.txt&quot;&gt;1494514336617290.txt&lt;/a&gt;&lt;/p&gt;&lt;p&gt;大概梵蒂冈的风格的风格大方施工方 讽德诵功富商大贾反对过分的发送到发送到发的广泛的稍等说法的冬瓜地方广泛的的双方各讽德诵功梵蒂冈但是公司的反攻倒算是否是个负担高大上说法的东方大厦割发代首讽德诵功是的个第三个地方高等师范冬瓜谁说的是代付&lt;br/&gt;&lt;/p&gt;', '0', '0', null);
INSERT INTO `efan_creative` VALUES ('5', '18', '1495028132', '111111', '1', '<p style=\"line-height: 16px;\"><img style=\"vertical-align: middle; margin-right: 2px;\" src=\"http://localhost/efan/Public/assets/ueditor/dialogs/attachment/fileTypeImages/icon_pdf.gif\"/><a style=\"font-size:12px; color:#0066cc;\" href=\"/ueditor/php/upload/file/20170511/1494517163136802.pdf\" title=\"1494517163136802.pdf\">1494517163136802.pdf</a></p><p style=\"line-height: 16px;\"><img style=\"vertical-align: middle; margin-right: 2px;\" src=\"http://localhost/efan/Public/assets/ueditor/dialogs/attachment/fileTypeImages/icon_txt.gif\"/><a style=\"font-size:12px; color:#0066cc;\" href=\"/ueditor/php/upload/file/20170511/1494514336617290.txt\" title=\"1494514336617290.txt\">1494514336617290.txt</a></p><p>dsfsddsfsdfsdfsd ff<br/></p><p>fsdfdsfaskdjflkdasjflk sdaljfls d</p><p>交流空间撒垃圾分类收到了&nbsp;</p><p>efrsdsf<br/></p>', '0', '0', null);
INSERT INTO `efan_creative` VALUES ('6', '18', '1495098737', '123', '1', '<p>111</p>', '0', '0', null);
INSERT INTO `efan_creative` VALUES ('7', '18', '1495098963', '1233213232', '2', '<p style=\"line-height: 16px;\"><img style=\"vertical-align: middle; margin-right: 2px;\" src=\"http://efan.chuzg.top/Public/assets/ueditor/dialogs/attachment/fileTypeImages/icon_txt.gif\"/><a style=\"font-size:12px; color:#0066cc;\" href=\"/ueditor/php/upload/file/20170518/1495098992564921.txt\" title=\"123.txt\">123.txt</a></p><p>V脚后跟vb美女后面那个vb没结婚更不会美国 开机后可大华股份肯定撒黄瓜和肺癌的a 肤色较黑卡撒垃圾分类卡上的纠纷卡了就离开撒娇卢卡斯大家来看爱上了卡时间老大睡觉了开发睡觉了可加分拉开距离开发撒娇了开发设计老卡机了开发商就开了房老卡时间发了卡圣诞节立刻发记录<br/></p>', '0', '0', null);
INSERT INTO `efan_creative` VALUES ('8', '18', '1495099139', '11111', '1', '<p style=\"line-height: 16px;\"><img style=\"vertical-align: middle; margin-right: 2px;\" src=\"http://efan.chuzg.top/Public/assets/ueditor/dialogs/attachment/fileTypeImages/icon_txt.gif\"/><a style=\"font-size:12px; color:#0066cc;\" href=\"/ueditor/php/upload/file/20170518/1495099151659419.xlsx\" title=\"新建 Microsoft Excel 工作表.xlsx\">新建 Microsoft Excel 工作表.xlsx</a></p><p><br/></p>', '0', '0', null);
INSERT INTO `efan_creative` VALUES ('9', '18', '1495463330', 'fsdsdfsdfsdf', '2', '<p>fsfsdfsdd</p>', '0', '0', null);
INSERT INTO `efan_creative` VALUES ('10', '18', '1495463350', 'fggdfgfdgdfgfdgdf', '3', '<p>afdsfsafdsf</p>', '0', '0', null);
INSERT INTO `efan_creative` VALUES ('11', '18', '1495463378', 'dfgdgdgfgfdgd', '3', '<p>gfdgdfgggdfgfd</p>', '0', '0', null);
INSERT INTO `efan_creative` VALUES ('12', '38', '1495639340', '测试中文创意1', '4', '<p>反正就是各种测试各种测试 &nbsp;测试测试测试</p><p><br/></p><p>特殊测试 特殊测试</p><p><br/></p><p><br/></p><p style=\"line-height: 16px;\"><img style=\"vertical-align: middle; margin-right: 2px;\" src=\"http://efan.chuzg.top/Public/assets/ueditor/dialogs/attachment/fileTypeImages/icon_txt.gif\"/><a style=\"font-size:12px; color:#0066cc;\" href=\"/ueditor/php/upload/file/20170524/1495639395124503.xlsx\" title=\"efan_module.xlsx\">efan_module.xlsx</a></p><p><br/></p>', '1', '0', null);
INSERT INTO `efan_creative` VALUES ('13', '38', '1500744687', '1111', '2', '<p>fasdfdsafasfasfads<br/></p>', '1', '0', null);
INSERT INTO `efan_creative` VALUES ('14', '38', '1501349317', '111', '3', '<p>13443432423424223324<br/></p>', '1', '0', null);

-- ----------------------------
-- Table structure for efan_creative_group
-- ----------------------------
DROP TABLE IF EXISTS `efan_creative_group`;
CREATE TABLE `efan_creative_group` (
  `id` int(3) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `group` longtext NOT NULL COMMENT '创意类别',
  `active` int(1) NOT NULL DEFAULT '1' COMMENT '当前分类是否可用，1-可用，0-不可用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of efan_creative_group
-- ----------------------------
INSERT INTO `efan_creative_group` VALUES ('1', '物联网', '1');
INSERT INTO `efan_creative_group` VALUES ('2', '桌面应用（PC方向）', '1');
INSERT INTO `efan_creative_group` VALUES ('3', '工业4.0', '1');
INSERT INTO `efan_creative_group` VALUES ('4', '经济类', '1');
INSERT INTO `efan_creative_group` VALUES ('5', '手机APP（Android/IOS/Windows Phone/微信）', '1');
INSERT INTO `efan_creative_group` VALUES ('6', '网站类', '1');

-- ----------------------------
-- Table structure for efan_daily
-- ----------------------------
DROP TABLE IF EXISTS `efan_daily`;
CREATE TABLE `efan_daily` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `time` bigint(11) NOT NULL,
  `uid` varchar(2) NOT NULL,
  `info` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of efan_daily
-- ----------------------------
INSERT INTO `efan_daily` VALUES ('1', '1495728000', '18', '123');
INSERT INTO `efan_daily` VALUES ('3', '1495728000', '38', '123456789');
INSERT INTO `efan_daily` VALUES ('4', '1495728000', '11', '123132151');
INSERT INTO `efan_daily` VALUES ('5', '1495728000', '12', 'sdfsdfsdfasdf是不是都是不是都');
INSERT INTO `efan_daily` VALUES ('6', '1498469746', '18', '111111111111');

-- ----------------------------
-- Table structure for efan_interim_permision
-- ----------------------------
DROP TABLE IF EXISTS `efan_interim_permision`;
CREATE TABLE `efan_interim_permision` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `uid` int(3) NOT NULL,
  `interimpermision` int(1) NOT NULL,
  `time` bigint(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of efan_interim_permision
-- ----------------------------
INSERT INTO `efan_interim_permision` VALUES ('5', '18', '4', '1496505599');
INSERT INTO `efan_interim_permision` VALUES ('2', '18', '8', '1464710400');
INSERT INTO `efan_interim_permision` VALUES ('3', '18', '3', '1496419199');

-- ----------------------------
-- Table structure for efan_mobile_creative
-- ----------------------------
DROP TABLE IF EXISTS `efan_mobile_creative`;
CREATE TABLE `efan_mobile_creative` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `uid` int(3) NOT NULL,
  `title` varchar(50) NOT NULL,
  `group` int(3) NOT NULL,
  `content` longtext NOT NULL,
  `time` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of efan_mobile_creative
-- ----------------------------
INSERT INTO `efan_mobile_creative` VALUES ('1', '18', '1312321321', '2', '<p>13213313121312<br/></p>', '1499354057');
INSERT INTO `efan_mobile_creative` VALUES ('2', '18', '1111', '1', '<p>12313123123121<br/></p>', '1499354940');

-- ----------------------------
-- Table structure for efan_mobile_creative_time
-- ----------------------------
DROP TABLE IF EXISTS `efan_mobile_creative_time`;
CREATE TABLE `efan_mobile_creative_time` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `creative_time_start` bigint(13) NOT NULL,
  `creative_time_end` bigint(13) NOT NULL,
  `info` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of efan_mobile_creative_time
-- ----------------------------
INSERT INTO `efan_mobile_creative_time` VALUES ('1', '1469894400', '1469894409', 'test');
INSERT INTO `efan_mobile_creative_time` VALUES ('2', '1469894410', '1469894411', '测试报名系统');
INSERT INTO `efan_mobile_creative_time` VALUES ('3', '1472653216', '1475251200', '2016级新生');
INSERT INTO `efan_mobile_creative_time` VALUES ('4', '1483203661', '1514739661', '测试移动应用开发创意统计');

-- ----------------------------
-- Table structure for efan_mobile_group
-- ----------------------------
DROP TABLE IF EXISTS `efan_mobile_group`;
CREATE TABLE `efan_mobile_group` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `group` varchar(255) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of efan_mobile_group
-- ----------------------------
INSERT INTO `efan_mobile_group` VALUES ('1', 'IOS', '1');
INSERT INTO `efan_mobile_group` VALUES ('2', 'ANDROID', '1');
INSERT INTO `efan_mobile_group` VALUES ('3', 'WECHAT', '1');

-- ----------------------------
-- Table structure for efan_module
-- ----------------------------
DROP TABLE IF EXISTS `efan_module`;
CREATE TABLE `efan_module` (
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '标题即菜单显示的内容',
  `pid` varchar(50) NOT NULL DEFAULT '0' COMMENT '上级分类Key 0表示1级分类',
  `sort` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序（同级有效）',
  `url` char(255) NOT NULL DEFAULT '' COMMENT '链接地址',
  `hide` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否隐藏 0-不隐藏 1-隐藏',
  `key` varchar(50) NOT NULL COMMENT '标识 这个唯一标识 不允许重复 全是英文',
  `type` tinyint(4) NOT NULL DEFAULT '2' COMMENT '1:菜单 2操作',
  `pic` varchar(50) NOT NULL DEFAULT '' COMMENT 'bootstrap 前面的图表代码',
  PRIMARY KEY (`key`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of efan_module
-- ----------------------------
INSERT INTO `efan_module` VALUES ('主页', '0', '0', 'Main/Index/index', '0', 'WELCOMEINDEX', '1', 'linecons-cog');
INSERT INTO `efan_module` VALUES ('主页通知列表', 'WELCOMEINDEX', '0', 'Main/Notice/index', '0', 'WELCOMEINDEXNOTICE', '2', '');
INSERT INTO `efan_module` VALUES ('新建通知', 'WELCOMEINDEXNOTICE', '0', 'Main/Notice/noticeNew', '0', 'WELCOMEINDEXNOTICENEW', '2', '');
INSERT INTO `efan_module` VALUES ('新建通知提交', 'WELCOMEINDEXNOTICENEW', '0', 'Main/Notice/noticeNew', '0', 'WELCOMEINDEXNOTICENEWSUBMIT', '2', '');
INSERT INTO `efan_module` VALUES ('编辑通知', 'WELCOMEINDEXNOTICE', '0', 'Main/Notice/edit', '0', 'WELCOMEINDEXNOTICEEDIT', '2', '');
INSERT INTO `efan_module` VALUES ('编辑通知提交', 'WELCOMEINDEXNOTICEEDIT', '0', 'Main/Notice/edit', '0', 'WELCOMEINDEXNOTICEEDITSUBMIT', '2', '');
INSERT INTO `efan_module` VALUES ('通知标记重要', 'WELCOMEINDEXNOTICE', '0', 'Main/Notice/important', '0', 'WELCOMEINDEXNOTICEIMPORTANT', '2', '');
INSERT INTO `efan_module` VALUES ('取消标记重要', 'WELCOMEINDEXNOTICE', '0', 'Main/Notice/disImportant', '0', 'WELCOMEINDEXNOTICEDISIMPORTANT', '2', '');
INSERT INTO `efan_module` VALUES ('删除通知', 'WELCOMEINDEXNOTICE', '0', 'Main/Notice/noticeDelete', '0', 'WELCOMEINDEXNOTICEDELETE', '2', '');
INSERT INTO `efan_module` VALUES ('成员信息', '0', '1', '', '0', 'USERINFORMATION', '1', 'linecons-user');
INSERT INTO `efan_module` VALUES ('成员列表', 'USERINFORMATION', '0', 'User/User/index', '0', 'USERLIST', '1', '');
INSERT INTO `efan_module` VALUES ('模板下载', 'USERLIST', '0', '', '0', 'USERTEMPLEDOWNLOAD', '2', '');
INSERT INTO `efan_module` VALUES ('编辑成员信息', 'USERLIST', '0', 'User/User/edit', '0', 'USEREDIT', '2', '');
INSERT INTO `efan_module` VALUES ('编辑信息提交', 'USEREDIT', '0', 'User/User/edit', '0', 'USEREDITSUBMIT', '2', '');
INSERT INTO `efan_module` VALUES ('删除成员信息', 'USERLIST', '0', 'User/User/delete', '0', 'USERDELETE', '2', '');
INSERT INTO `efan_module` VALUES ('限制登录', 'USERLIST', '0', 'User/User/limitLogin', '0', 'USERLIMITLOGIN', '2', '');
INSERT INTO `efan_module` VALUES ('解除限制', 'USERLIST', '0', 'User/User/disLimitLogin', '0', 'USERDISLIMITLOGIN', '2', '');
INSERT INTO `efan_module` VALUES ('重置密码', 'USERLIST', '0', 'User/User/resetPassword', '0', 'USERRESETPASSWORLD', '2', '');
INSERT INTO `efan_module` VALUES ('编辑权限', 'USERLIST', '0', 'User/User/changePermision', '0', 'USERCHANGEPERMISION', '2', '');
INSERT INTO `efan_module` VALUES ('指派临时权限', 'USERLIST', '0', 'User/User/viewInterimPermision', '0', 'USERINTERIMPERMISION', '2', '');
INSERT INTO `efan_module` VALUES ('临时权限编辑', 'USERINTERIMPERMISION', '0', 'User/User/interimPermisionEdit', '0', 'USERINTERIMPERMISIONEDIT', '2', '');
INSERT INTO `efan_module` VALUES ('临时权限编辑提交', 'USERINTERIMPERMISIONEDIT', '0', 'User/User/interimPermisionEditSubmit', '0', 'USERINTERIMPERMISIONEDITSUBMIT', '2', '');
INSERT INTO `efan_module` VALUES ('临时权限删除', 'USERINTERIMPERMISION', '0', 'User/User/interimPermisionDelete', '0', 'USERINTERIMPERMISIONDELETE', '2', '');
INSERT INTO `efan_module` VALUES ('临时权限新建', 'USERLIST', '0', 'User/User/interimPermisionNew', '0', 'USERINTERIMPERMISIONNEW', '2', '');
INSERT INTO `efan_module` VALUES ('临时权限新建提交', 'USERINTERIMPERMISIONNEW', '0', 'User/User/interimPermisionNewSubmit', '0', 'USERINTERIMPERMISIONNEWSUBMIT', '2', '');
INSERT INTO `efan_module` VALUES ('批量导入用户', 'USERLIST', '0', 'User/User/leadingIn', '0', 'USERLEADINGIN', '2', '');
INSERT INTO `efan_module` VALUES ('批量导入用户提交', 'USERLEADINGIN', '0', 'User/User/leadingIn', '0', 'USERLEADINGINSUBMIT', '2', '');
INSERT INTO `efan_module` VALUES ('新建用户', 'USERLIST', '0', 'User/User/newUser', '0', 'USERNEW', '2', '');
INSERT INTO `efan_module` VALUES ('新建用户提交', 'USERLIST', '0', 'User/User/newUser', '0', 'USERNEWSUBMIT', '2', '');
INSERT INTO `efan_module` VALUES ('群发短信', 'USERINFORMATION', '0', 'User/Message/index', '0', 'USERMESSAGE', '1', '');
INSERT INTO `efan_module` VALUES ('发送短信', 'USERMESSAGE', '0', 'User/Message/send', '0', 'USERMESSAGESEND', '2', '');
INSERT INTO `efan_module` VALUES ('个人设置', '0', '10', '', '0', 'INFORMATION', '1', 'linecons-cog');
INSERT INTO `efan_module` VALUES ('修改个人信息', 'INFORMATION', '0', 'Info/User/index', '0', 'INFORMATIONUSER', '1', '');
INSERT INTO `efan_module` VALUES ('修改个人信息提交', 'INFORMATIONUSER', '0', 'Info/User/index', '0', 'INFORMATIONUSERSUBMIT', '2', '');
INSERT INTO `efan_module` VALUES ('修改密码', 'INFORMATION', '0', 'Info/Changepass/index', '0', 'INFORMATIONCHANGEPASSWORD', '1', 'fa-edit');
INSERT INTO `efan_module` VALUES ('修改密码提交', 'INFORMATIONCHANGEPASSWORD', '0', 'Info/Changepass/index', '0', 'INFORMATIONCHANGEPASSWORDSUBMIT', '2', '');
INSERT INTO `efan_module` VALUES ('报告bug', 'INFORMATION', '0', 'Info/Submitbug/index', '0', 'INFORMATIONBUG', '1', 'fa-info');
INSERT INTO `efan_module` VALUES ('报告bug提交', 'INFORMATIONBUG', '0', 'Info/Submitbug/index', '0', 'INFORMATIONBUGSUBMIT', '2', '');
INSERT INTO `efan_module` VALUES ('退出登陆', 'INFORMATION', '0', 'Info/Loginout/index', '0', 'INFORMATIONLOGINOUT', '1', 'fa-lock');
INSERT INTO `efan_module` VALUES ('招新相关', '0', '9', '', '0', 'RECRUIT', '1', 'linecons-cog');
INSERT INTO `efan_module` VALUES ('招新面试', 'RECRUIT', '0', 'Recruit/Recruit/index', '0', 'RECRUITINDEX', '1', '');
INSERT INTO `efan_module` VALUES ('查询面试信息', 'RECRUITINDEX', '0', 'Recruit/Recruit/view', '0', 'RECRUITVIEW', '2', '');
INSERT INTO `efan_module` VALUES ('修改面试手机', 'RECRUITINDEX', '0', 'Recruit/Recruit/changePhone', '0', 'RECRUITCHANGE', '2', '');
INSERT INTO `efan_module` VALUES ('招新管理', 'RECRUIT', '0', 'Recruit/Audition/index', '0', 'AUDITION', '1', '');
INSERT INTO `efan_module` VALUES ('发送面试通知', 'AUDITION', '0', 'Recruit/Audition/sendMessage', '0', 'AUDITIONSENDMESSAGE', '2', '');
INSERT INTO `efan_module` VALUES ('修改面试伦次', 'AUDITION', '0', 'Recruit/Audition/rotation', '0', 'AUDITIONROTATION', '2', '');
INSERT INTO `efan_module` VALUES ('编辑个人信息', 'AUDITION', '0', 'Recruit/Audition/edit', '0', 'AUDITIONEDIT', '2', '');
INSERT INTO `efan_module` VALUES ('编辑个人信息提交', 'AUDITIONEDIT', '0', 'Recruit/Audition/edit', '0', 'AUDITIONEDITSUBMIT', '2', '');
INSERT INTO `efan_module` VALUES ('添加招新人员', 'AUDITION', '0', 'Recruit/Audition/add', '0', 'AUDITIONADD', '2', '');
INSERT INTO `efan_module` VALUES ('设置面试官', 'AUDITION', '0', 'Recruit/Audition/addInterim', '0', 'AUDITIONINTERIM', '2', '');
INSERT INTO `efan_module` VALUES ('淘汰', 'AUDITION', '0', 'Recruit/Audition/out', '0', 'AUDITIONOUT', '2', '');
INSERT INTO `efan_module` VALUES ('进入下一轮', 'AUDITION', '0', 'Recruit/Audition/next', '0', 'AUDITIONNEXT', '2', '');
INSERT INTO `efan_module` VALUES ('返回上一轮', 'AUDITION', '0', 'Recruit/Audition/last', '0', 'AUDITIONLAST', '2', '');
INSERT INTO `efan_module` VALUES ('设置面试时间', 'AUDITION', '0', 'Recruit/Audition/auditionTime', '0', 'AUDITIONTIME', '2', '');
INSERT INTO `efan_module` VALUES ('设置面试时间提交', 'AUDITIONTIME', '0', 'Recruit/Audition/auditionTime', '0', 'AUDITIONTIMESUBMIT', '2', '');
INSERT INTO `efan_module` VALUES ('入选', 'AUDITION', '0', 'Recruit/Audition/in', '0', 'AUDITIONIN', '2', '');
INSERT INTO `efan_module` VALUES ('招新批次管理', 'RECRUIT', '0', 'Recruit/Admin/index', '0', 'RECRUITADMIN', '2', '');
INSERT INTO `efan_module` VALUES ('新建招新批次', 'RECRUITADMIN', '0', 'Recruit/Admin/new', '0', 'RECRUITADMINNEW', '2', '');
INSERT INTO `efan_module` VALUES ('新建招新批次提交', 'RECRUITADMINNEW', '0', 'Recruit/Admin/new', '0', 'RECRUITADMINNEWSUBMIT', '2', '');
INSERT INTO `efan_module` VALUES ('日报周报', '0', '8', '', '0', 'TEAMDAILY', '1', 'linecons-cog');
INSERT INTO `efan_module` VALUES ('日报列表', 'TEAMDAILY', '0', 'Daily/Daily/index', '0', 'TEAMDAILYLIST', '1', '');
INSERT INTO `efan_module` VALUES ('填写日报', 'TEAMDAILY', '0', 'Daily/Daily/submit', '0', 'TEAMDAILYNEW', '1', '');
INSERT INTO `efan_module` VALUES ('提交日报', 'TEAMDAILYNEW', '0', 'Daily/Daily/submit', '0', 'TEAMDAILYSUBMIT', '2', '');
INSERT INTO `efan_module` VALUES ('周报补充', 'TEAMDAILY', '0', 'Daily/Daily/other', '0', 'TEAMDAILYOTHER', '1', '');
INSERT INTO `efan_module` VALUES ('补充提交', 'TEAMDAILYOTHER', '0', 'Daily/Daily/other', '0', 'TEAMDAILYOTHERSUBMIT', '2', '');
INSERT INTO `efan_module` VALUES ('测试上传', 'TEAMDAILYLIST', '0', 'Daily/Daily/index', '0', 'TEAMDAILYLISTUPLOAD', '2', '');
INSERT INTO `efan_module` VALUES ('查看日报', 'TEAMDAILYLIST', '0', 'Daily/Daily/look', '0', 'TEAMDAILYLISTLOOK', '2', '');
INSERT INTO `efan_module` VALUES ('日报管理', 'TEAMDAILY', '0', 'Daily/Dailyadmin/index', '0', 'TEAMDAILYADMIN', '1', '');
INSERT INTO `efan_module` VALUES ('生成周报', 'TEAMDAILYADMIN', '0', 'Daily/Dailyadmin/make', '0', 'TEAMDAILYADMINMAKE', '2', '');
INSERT INTO `efan_module` VALUES ('查看日报', 'TEAMDAILYADMIN', '0', 'Daily/Dailyadmin/look', '0', 'TEAMDAILYADMINLOOK', '2', '');
INSERT INTO `efan_module` VALUES ('创意会', '0', '7', '', '0', 'CREATIVECLUB', '1', 'linecons-cog');
INSERT INTO `efan_module` VALUES ('创意管理', 'CREATIVECLUB', '0', 'Creative/Admin/index', '0', 'CREATIVECLUBADMIN', '1', '');
INSERT INTO `efan_module` VALUES ('关闭讨论', 'CREATIVECLUBADMIN', '0', 'Creative/Admin/close', '0', 'CREATIVECLUBADMINCLOSE', '2', '');
INSERT INTO `efan_module` VALUES ('统计未参与讨论人员', 'CREATIVECLUBADMIN', '0', 'Creative/Admin/count', '0', 'CREATIVECLUBADMINCOUNTNO', '2', '');
INSERT INTO `efan_module` VALUES ('删除创意', 'CREATIVECLUBADMIN', '0', 'Creative/Admin/delete', '0', 'CREATIVECLUBADMINDELETE', '2', '');
INSERT INTO `efan_module` VALUES ('下载讨论结果pdf', 'CREATIVECLUBADMIN', '0', '', '0', 'CREATIVECLUBADMINDOWNLOAD', '2', '');
INSERT INTO `efan_module` VALUES ('编辑创意', 'CREATIVECLUBADMIN', '0', 'Creative/Admin/edit', '0', 'CREATIVECLUBADMINEDIT', '2', '');
INSERT INTO `efan_module` VALUES ('编辑创意显示团队编号', 'CREATIVECLUBADMINEDIT', '0', 'Creative/Admin/findUID', '0', 'CREATIVECLUBADMINEDITFINDUID', '2', '');
INSERT INTO `efan_module` VALUES ('提交编辑创意', 'CREATIVECLUBADMINEDIT', '0', 'Creative/Admin/edit', '0', 'CREATIVECLUBADMINEDITEDIT', '2', '');
INSERT INTO `efan_module` VALUES ('导入禅道', 'CREATIVECLUBADMIN', '0', 'Creative/Admin/leadingin', '0', 'CREATIVECLUBADMINLEADINGIN', '2', '');
INSERT INTO `efan_module` VALUES ('开启讨论', 'CREATIVECLUBADMIN', '0', 'Creative/Admin/open', '0', 'CREATIVECLUBADMINOPEN', '2', '');
INSERT INTO `efan_module` VALUES ('保存讨论结果为pdf', 'CREATIVECLUBADMIN', '0', 'Creative/Admin/pdf', '0', 'CREATIVECLUBADMINPDF', '2', '');
INSERT INTO `efan_module` VALUES ('创意会类别管理', 'CREATIVECLUBADMIN', '0', 'Creative/Admin/group', '0', 'CREATIVECLUBADMINGROUP', '2', '');
INSERT INTO `efan_module` VALUES ('创意会类别提交', 'CREATIVECLUBADMINGROUP', '0', 'Creative/Admin/group', '0', 'CREATIVECLUBADMINGROUPSUBMIT', '2', '');
INSERT INTO `efan_module` VALUES ('创意列表', 'CREATIVECLUB', '0', 'Creative/Creative/index', '0', 'CREATIVECLUBLIST', '1', '');
INSERT INTO `efan_module` VALUES ('讨论创意', 'CREATIVECLUBLIST', '0', 'Creative/Creative/reply', '0', 'CREATIVECLUBLISTREPLY', '2', '');
INSERT INTO `efan_module` VALUES ('删除讨论', 'CREATIVECLUBLISTREPLY', '0', 'Creative/Creative/delete', '0', 'CREATIVECLUBLISTREPLYDELETE', '2', '');
INSERT INTO `efan_module` VALUES ('讨论评论', 'CREATIVECLUBLISTREPLY', '0', 'Creative/Creative/discuss', '0', 'CREATIVECLUBLISTREPLYDISCUSS', '2', '');
INSERT INTO `efan_module` VALUES ('编辑创意', 'CREATIVECLUBLISTREPLY', '0', 'Creative/Creative/edit', '0', 'CREATIVECLUBLISTREPLYEDIT', '2', '');
INSERT INTO `efan_module` VALUES ('编辑创意显示团队编号', 'CREATIVECLUBLISTREPLYEDIT', '0', 'Creative/Creative/findUID', '0', 'CREATIVECLUBLISTREPLYEDITFINDUID', '2', '');
INSERT INTO `efan_module` VALUES ('编辑创意提交', 'CREATIVECLUBLISTREPLYEDIT', '0', 'Creative/Creative/edit', '0', 'CREATIVECLUBLISTREPLYEDITSUBMIT', '2', '');
INSERT INTO `efan_module` VALUES ('讨论返回', 'CREATIVECLUBLISTREPLY', '0', 'Creative/Creative/index', '0', 'CREATIVECLUBLISTREPLYRETURN', '2', '');
INSERT INTO `efan_module` VALUES ('创意讨论', 'CREATIVECLUBLISTREPLY', '0', 'Creative/Creative/reply', '0', 'CREATIVECLUBLISTREPLYREPLY', '2', '');
INSERT INTO `efan_module` VALUES ('编辑创意', 'CREATIVECLUBLIST', '0', 'Creative/Creative/edit', '0', 'CREATIVECLUBLISTEDIT', '2', '');
INSERT INTO `efan_module` VALUES ('编辑创意提交', 'CREATIVECLUBLISTEDIT', '0', 'Creative/Creative/edit', '0', 'CREATIVECLUBLISTEDITSUBMIT', '2', '');
INSERT INTO `efan_module` VALUES ('发布创意', 'CREATIVECLUB', '0', 'Creative/Publish/index', '0', 'CREATIVECLUBNEW', '1', '');
INSERT INTO `efan_module` VALUES ('显示团队编号', 'CREATIVECLUBNEW', '0', 'Creative/Publish/findUID', '0', 'CREATIVECLUBNEWFINDUID', '2', '');
INSERT INTO `efan_module` VALUES ('提交创意', 'CREATIVECLUBNEW', '0', 'Creative/Publish/index', '0', 'CREATIVECLUBNEWSUBMIT', '2', '');
INSERT INTO `efan_module` VALUES ('移动应用开发', '0', '6', '', '0', 'MOBILE', '1', 'linecons-cog');
INSERT INTO `efan_module` VALUES ('创意申报', 'MOBILE', '0', 'Mobile/Creative/index', '0', 'MOBILECREATIVE', '1', '');
INSERT INTO `efan_module` VALUES ('创意提交', 'MOBILECREATIVE', '0', 'Mobile/Creative/submit', '0', 'MOBILECREATIVESUBMIT', '2', '');
INSERT INTO `efan_module` VALUES ('创意列表', 'MOBILE', '0', 'Mobile/Mobile/index', '0', 'MOBILELIST', '2', '');
INSERT INTO `efan_module` VALUES ('编辑创意', 'MOBILELIST', '0', 'Mobile/Mobile/edit', '0', 'MOBILELISTEDIT', '2', '');
INSERT INTO `efan_module` VALUES ('编辑创意提交', 'MOBILELISTEDIT', '0', 'Mobile/Mobile/edit', '0', 'MOBILELISTEDITSUBMIT', '2', '');
INSERT INTO `efan_module` VALUES ('查看创意', 'MOBILELIST', '0', 'Mobile/Mobile/look', '0', 'MOBILELISTLOOK', '2', '');
INSERT INTO `efan_module` VALUES ('删除创意', 'MOBILELIST', '0', 'Mobile/Mobile/delete', '0', 'MOBILELISTDELETE', '2', '');
INSERT INTO `efan_module` VALUES ('创意管理', 'MOBILE', '0', 'Mobile/Mobileadmin/index', '0', 'MOBILEADMIN', '1', '');
INSERT INTO `efan_module` VALUES ('提交时间管理', 'MOBILEADMIN', '0', 'Mobile/Mobileadmin/submitTime', '0', 'MOBILEADMINSUBMITTIME', '2', '');
INSERT INTO `efan_module` VALUES ('提交时间编辑', 'MOBILEADMIN', '0', 'Mobile/Mobileadmin/submitTimeEdit', '0', 'MOBILEADMINSUBMITTIMEEDIT', '2', '');
INSERT INTO `efan_module` VALUES ('提交时间编辑提交', 'MOBILEADMIN', '0', 'Mobile/Mobileadmin/submitTimeEdit', '0', 'MOBILEADMINSUBMITTIMEEDITSUBMIT', '2', '');
INSERT INTO `efan_module` VALUES ('提交时间删除', 'MOBILEADMIN', '0', 'Mobile/Mobileadmin/submitTimeDelete', '0', 'MOBILEADMINSUBMITTIMEDELETE', '2', '');
INSERT INTO `efan_module` VALUES ('新建提交时间', 'MOBILEADMIN', '0', 'Mobile/Mobileadmin/submitTimeNew', '0', 'MOBILEADMINSUBMITTIMENEW', '2', '');
INSERT INTO `efan_module` VALUES ('新建提交时间提交', 'MOBILEADMIN', '0', 'Mobile/Mobileadmin/submitTimeNew', '0', 'MOBIELADMINSUBMITTIMENEWSUBMIT', '2', '');
INSERT INTO `efan_module` VALUES ('编辑创意', 'MOBILEADMIN', '0', 'Mobile/Mobileadmin/edit', '0', 'MOBILEADMINEDIT', '2', '');
INSERT INTO `efan_module` VALUES ('编辑创意提交', 'MOBILEADMINEDIT', '0', 'Mobile/Mobileadmin/edit', '0', 'MOBILEADMINEDITSUBMIT', '2', '');
INSERT INTO `efan_module` VALUES ('删除创意', 'MOBILEADMIN', '0', 'Mobile/Mobileadmin/delete', '0', 'MOBILEADMINDELETE', '2', '');
INSERT INTO `efan_module` VALUES ('上报地主', 'MOBILEADMIN', '0', 'Mobile/Mobileadmin/uploadLeader', '0', 'MOBILEADMINUPLOADLEADER', '2', '');
INSERT INTO `efan_module` VALUES ('类别列表', 'MOBILEADMIN', '0', 'Mobile/Mobileadmin/groupList', '0', 'MOBILEADMINGROUPLIST', '2', '');
INSERT INTO `efan_module` VALUES ('编辑类别', 'MOBILEADMIN', '0', 'Mobile/Mobileadmin/groupListEdit', '0', 'MOBILEADMINGROUPLISTEDIT', '2', '');
INSERT INTO `efan_module` VALUES ('编辑类别提交', 'MOBILEADMIN', '0', 'Mobile/Mobileadmin/groupListEdit', '0', 'MOBILEADMINGROUPLISTEDITSUBMIT', '2', '');
INSERT INTO `efan_module` VALUES ('删除类别', 'MOBILEADMIN', '0', 'Mobile/Mobileadmin/groupListDelete', '0', 'MOBILEADMINGROUPLISTDELETE', '2', '');
INSERT INTO `efan_module` VALUES ('新建类别', 'MOBILEADMIN', '0', 'Mobile/Mobileadmin/groupListNew', '0', 'MOBILEADMINGROUPLISTNEW', '2', '');
INSERT INTO `efan_module` VALUES ('新建类别提交', 'MOBILEADMIN', '0', 'Mobile/Mobileadmin/groupListNew', '0', 'MOBILEADMINGROUPLISTNEWSUBMIT', '2', '');
INSERT INTO `efan_module` VALUES ('类别锁定', 'MOBILEADMIN', '0', 'Mobile/Mobileadmin/groupListLock', '0', 'MOBILEADMINGROUPLISTLOCK', '2', '');
INSERT INTO `efan_module` VALUES ('类别解锁', 'MOBILEADMIN', '0', 'Mobile/Mobileadmin/groupListUnlock', '0', 'MOBILEADMINGROUPLISTUNLOCK', '2', '');
INSERT INTO `efan_module` VALUES ('创意评分', 'MOBILE', '0', 'Mobile/Mobilescore/index', '0', 'MOBILESCORE', '1', '');
INSERT INTO `efan_module` VALUES ('查看创意', 'MOBILESCORE', '0', 'Mobile/Mobilescore/score', '0', 'MOBILESCORESCORE', '2', '');
INSERT INTO `efan_module` VALUES ('评分提交', 'MOBILESCORESCORE', '0', 'Mobile/Mobilescore/score', '0', 'MOBILESCORESCORESUBMIT', '2', '');
INSERT INTO `efan_module` VALUES ('地主列表', 'MOBILE', '0', 'Mobile/Mobileleader/index', '0', 'MOBILELEADER', '1', '');
INSERT INTO `efan_module` VALUES ('查看创意', 'MOBILELEADER', '0', 'Mobile/Mobileleader/change', '0', 'MOBILELEADERCHANGE', '2', '');
INSERT INTO `efan_module` VALUES ('修改意见提交', 'MOBILELEADERCHANGE', '0', 'Mobile/Mobileleader/change', '0', 'MOBILELEADERCHANGESUBMIT', '2', '');
INSERT INTO `efan_module` VALUES ('系统设置', '0', '11', '', '0', 'SYSTEM', '1', 'linecons-cog');
INSERT INTO `efan_module` VALUES ('专业管理', 'SYSTEM', '0', 'System/Major/index', '0', 'SYSTEMMAJORINDEX', '1', '');
INSERT INTO `efan_module` VALUES ('新建专业', 'SYSTEMMAJORINDEX', '0', 'System/Major/newMajor', '0', 'SYSTEMMAJORNEW', '2', '');
INSERT INTO `efan_module` VALUES ('新建专业提交', 'SYSTIMMAJORINDEX', '0', 'System/Major/newMajor', '0', 'SYSTEMMAJORNEWSUBMIT', '2', '');
INSERT INTO `efan_module` VALUES ('编辑专业', 'SYSTEMMAJORINDEX', '0', 'System/Major/edit', '0', 'SYSTEMMAJOREDIT', '2', '');

-- ----------------------------
-- Table structure for efan_notice
-- ----------------------------
DROP TABLE IF EXISTS `efan_notice`;
CREATE TABLE `efan_notice` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL,
  `content` longtext NOT NULL,
  `important` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of efan_notice
-- ----------------------------
INSERT INTO `efan_notice` VALUES ('1', '123', '<p>fdasfsdfsafsdfsdfsfasfasdfadsfdsa<br/></p>', '1');
INSERT INTO `efan_notice` VALUES ('2', '123', '<p>fdasfsdfsafsdfsdfsfasfasdfadsfdsa<br/></p>', '1');
INSERT INTO `efan_notice` VALUES ('3', '123345567', '<p>fsdafsdafsdfsdafsdfsadfdsasdfas<br/></p>', '1');
INSERT INTO `efan_notice` VALUES ('4', '1234567890123', '<p>1212121212121<br/></p>', '1');
INSERT INTO `efan_notice` VALUES ('5', '1', '<p>1231231231414233242fgdsasdfdsfds<br/></p>', '1');
INSERT INTO `efan_notice` VALUES ('9', '6', '<p>6<br/></p>', '0');
INSERT INTO `efan_notice` VALUES ('10', '7', '<p>7<br/></p>', '0');
INSERT INTO `efan_notice` VALUES ('11', '8', '<p>8<br/></p>', '0');
INSERT INTO `efan_notice` VALUES ('12', '9', '<p>9<br/></p>', '0');
INSERT INTO `efan_notice` VALUES ('13', '10', '<p>10<br/></p>', '0');
INSERT INTO `efan_notice` VALUES ('14', '11', '<p>11<br/></p>', '1');

-- ----------------------------
-- Table structure for efan_other
-- ----------------------------
DROP TABLE IF EXISTS `efan_other`;
CREATE TABLE `efan_other` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `time` bigint(11) NOT NULL,
  `uid` varchar(2) NOT NULL,
  `keynote` longtext NOT NULL,
  `summary` longtext NOT NULL,
  `plan` longtext NOT NULL,
  `idea` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of efan_other
-- ----------------------------
INSERT INTO `efan_other` VALUES ('2', '1495728000', '38', '发撒发的撒饭的撒1111', '但是范德萨发的撒饭都是发大水发的撒饭多少', '打仨范德萨放到沙发上的发生的范德萨发的撒饭的撒范德萨', '安定坊大S啊范德萨发的撒饭的萨芬打仨发的撒饭');
INSERT INTO `efan_other` VALUES ('3', '1495728000', '18', '不是都放到沙发的撒', '发生东方大厦发的撒饭', '发生地方大事发生打法', '发大水发生发生的发生的');
INSERT INTO `efan_other` VALUES ('4', '1498493752', '18', '123', '123', '123', '132');

-- ----------------------------
-- Table structure for efan_permision
-- ----------------------------
DROP TABLE IF EXISTS `efan_permision`;
CREATE TABLE `efan_permision` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `permision` longtext NOT NULL,
  `class` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of efan_permision
-- ----------------------------
INSERT INTO `efan_permision` VALUES ('1', '普通用户', '1');
INSERT INTO `efan_permision` VALUES ('2', '组长', '1');
INSERT INTO `efan_permision` VALUES ('3', '创意组负责人', '2');
INSERT INTO `efan_permision` VALUES ('4', '产品组负责人', '2');
INSERT INTO `efan_permision` VALUES ('5', '移动应用开发负责人', '2');
INSERT INTO `efan_permision` VALUES ('6', '微课负责人', '2');
INSERT INTO `efan_permision` VALUES ('7', '挑战杯负责人', '2');
INSERT INTO `efan_permision` VALUES ('8', '招新面试官', '2');
INSERT INTO `efan_permision` VALUES ('9', '团队负责人', '1');
INSERT INTO `efan_permision` VALUES ('10', '地主', '1');

-- ----------------------------
-- Table structure for efan_recruit
-- ----------------------------
DROP TABLE IF EXISTS `efan_recruit`;
CREATE TABLE `efan_recruit` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `studentid` varchar(14) NOT NULL,
  `name` varchar(32) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `college` longtext NOT NULL,
  `major` longtext NOT NULL,
  `class` varchar(99) NOT NULL,
  `birthday` varchar(10) NOT NULL,
  `QQ` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `introduce` longtext,
  `time` bigint(13) NOT NULL,
  `auditiontime` bigint(13) NOT NULL DEFAULT '0',
  `rotation` int(1) NOT NULL DEFAULT '1',
  `message` int(2) NOT NULL DEFAULT '0',
  `state` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of efan_recruit
-- ----------------------------
INSERT INTO `efan_recruit` VALUES ('19', '161305018', '李昂', '14741295519', '新能源学院（软件学院）', '软件工程', '161班', '800380800', '502378593', '502378593@qq.com', '', '1473245902', '1498060795', '1', '11', '0');
INSERT INTO `efan_recruit` VALUES ('21', '160301058', '王昊天', '13372873761', '电气工程学院', '测控技术与仪器', '162班', '904492800', '1710202298', '1710202298@qq.com', '本人擅长书法和唱歌，也很热爱计算机，我现在计算机上课是A班，也很热爱计算机。本人乐观开朗，想参加逸凡创新团队', '1474380099', '0', '1', '0', '0');
INSERT INTO `efan_recruit` VALUES ('22', '161801060', '潘彤彤', '13771804529', '化学与环境工程学院', '化学工程与工艺', '化工162班', '870451200', '744742991', '744742991@qq.com', '热情活泼开朗\r\n喜欢与人交往\r\n来自美丽的南方小镇 苏州\r\n爱学习 爱劳动\r\n为人细心\r\n非常细心', '1474467211', '0', '1', '0', '0');
INSERT INTO `efan_recruit` VALUES ('13', '160301051', '张彩山', '18937322122', '电气工程学院', '测控技术与仪器', '测控162', '899308800', '2290982545', '2290982545@qq.com', '我对贵团队的所学知识挺兴趣，在高中我觉得自己知识面还可以，上大学了我想继续拓宽自己的知识面，希望贵团队可以考虑我。谢谢！', '1473130539', '1474160400', '1', '11', '0');
INSERT INTO `efan_recruit` VALUES ('11', '160404044', '周兆龙', '18840181681', '电子与工程学院', '电子信息工程', '电子162班', '917452800', '2925202514', '2925202514@qq.com', '我比较性格开朗，平时也喜欢钻研物理知识，并且我希望在这大学四年里获得双学位！', '1473088469', '1474160400', '1', '11', '0');
INSERT INTO `efan_recruit` VALUES ('14', '160301033', '吴瑞林', '13204007106', '电气工程学院', '测控技术与仪器', '162', '888249600', '1653861011', '1653861011@qq.com', '个人角度比较喜欢计算机和软件设计，虽然很遗憾没去计算机专业。但也想在计算机方面有些涉猎和学习', '1473146087', '1474160400', '1', '11', '0');
INSERT INTO `efan_recruit` VALUES ('15', '160301039', '王春义', '18840181560', '电气工程学院', '测控技术与仪器', '测控2班', '860428800', '1939168337', '1939168337@qq.com', '来至辽宁本溪，我对于电脑信息很好奇，喜欢乒乓球', '1473146341', '1474160400', '1', '11', '0');
INSERT INTO `efan_recruit` VALUES ('16', '161902002', '李哲', '18840179596', '经济学院', '国际经济与贸易', '161', '882547200', '2560333812', '2560333812@qq.com', '我对于逸凡创新团队的工作非常感兴趣，并且希望能够加入来提升自己。', '1473160471', '1474196400', '1', '11', '0');
INSERT INTO `efan_recruit` VALUES ('17', '160301045', '王浩', '18840177923', '电气工程学院', '测控技术与仪器', '162班', '827596800', '1252914253', '1252914253@qq.com', '对计算机很感兴趣，请求加入亦凡团队', '1473166570', '1474196400', '1', '11', '0');
INSERT INTO `efan_recruit` VALUES ('20', '159807002', '颜飞', '18601339538', '电信学院', '计算机技术', '15级', '634147200', '1293652552', 'yanfeienter@126.com', '简介', '1474119411', '0', '1', '11', '1');

-- ----------------------------
-- Table structure for efan_recruit_time
-- ----------------------------
DROP TABLE IF EXISTS `efan_recruit_time`;
CREATE TABLE `efan_recruit_time` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `recruit_time_start` bigint(13) NOT NULL,
  `recruit_time_end` bigint(13) NOT NULL,
  `info` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of efan_recruit_time
-- ----------------------------
INSERT INTO `efan_recruit_time` VALUES ('1', '1469894400', '1469894409', 'test');
INSERT INTO `efan_recruit_time` VALUES ('2', '1469894410', '1469894411', '测试报名系统');
INSERT INTO `efan_recruit_time` VALUES ('3', '1472653216', '1475251200', '2016级新生');

-- ----------------------------
-- Table structure for efan_reply
-- ----------------------------
DROP TABLE IF EXISTS `efan_reply`;
CREATE TABLE `efan_reply` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `pid` int(5) NOT NULL DEFAULT '0' COMMENT '从回复的父类id，若为主回复为0',
  `uid` int(3) NOT NULL COMMENT '用户uid团队编号',
  `cid` int(3) NOT NULL DEFAULT '0' COMMENT '主回复指向创意id，从回复为0',
  `time` varchar(11) CHARACTER SET utf8 NOT NULL,
  `reply` longtext CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of efan_reply
-- ----------------------------
INSERT INTO `efan_reply` VALUES ('1', '0', '18', '5', '1495040223', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('2', '0', '18', '5', '1495040224', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('3', '0', '18', '5', '1495040225', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('4', '0', '18', '5', '1495040226', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('5', '0', '18', '5', '1495040227', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('6', '0', '18', '5', '1495040228', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('7', '0', '18', '5', '1495040229', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('8', '0', '18', '5', '1495040230', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('9', '0', '18', '5', '1495040231', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('10', '0', '18', '5', '1495040232', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('11', '0', '18', '5', '1495040233', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('12', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('13', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('14', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('15', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('16', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('17', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('18', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('19', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('20', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('21', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('22', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('23', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('24', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('25', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('26', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('27', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('28', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('29', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('30', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('31', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('32', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('33', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('34', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('35', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('36', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('37', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('38', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('39', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('40', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('41', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('42', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('43', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('44', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('45', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('46', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('47', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('48', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('49', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('50', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('51', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('52', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('53', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('54', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('55', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('56', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('57', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('58', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('59', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('60', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('61', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('62', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('63', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('64', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('65', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('66', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('67', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('68', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('69', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('70', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('71', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('72', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('73', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('74', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('75', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('76', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('77', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('78', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('79', '0', '18', '5', '1495040745', 'fsdfsdfsdfsdfsdfasfddafds');
INSERT INTO `efan_reply` VALUES ('80', '0', '18', '5', '1495089344', '放松的方式打发多少');
INSERT INTO `efan_reply` VALUES ('81', '0', '18', '5', '1495095539', 'fdsfdsfsd');
INSERT INTO `efan_reply` VALUES ('82', '0', '18', '5', '1495095573', 'fsdfsdfsd');
INSERT INTO `efan_reply` VALUES ('83', '0', '18', '5', '1495095703', '4444');
INSERT INTO `efan_reply` VALUES ('84', '1', '18', '0', '1495096311', '规范的规定发给对方');
INSERT INTO `efan_reply` VALUES ('85', '1', '18', '0', '1495096311', '规范的规定发给对方');
INSERT INTO `efan_reply` VALUES ('86', '2', '18', '0', '1495096825', '2-1');
INSERT INTO `efan_reply` VALUES ('87', '2', '18', '0', '1495096852', '2-2');
INSERT INTO `efan_reply` VALUES ('88', '2', '18', '0', '1495096852', '2-2');
INSERT INTO `efan_reply` VALUES ('89', '2', '18', '0', '1495096864', '2-3');
INSERT INTO `efan_reply` VALUES ('90', '3', '18', '0', '1495096871', '3-1');
INSERT INTO `efan_reply` VALUES ('91', '4', '18', '0', '1495096925', '4-1');
INSERT INTO `efan_reply` VALUES ('92', '4', '18', '0', '1495096938', '4-2');
INSERT INTO `efan_reply` VALUES ('93', '4', '18', '0', '1495096947', '咯咯咯');
INSERT INTO `efan_reply` VALUES ('94', '4', '18', '0', '1495096956', '咯咯咯');
INSERT INTO `efan_reply` VALUES ('95', '2', '18', '0', '1495097821', '个地方广泛的广泛的');
INSERT INTO `efan_reply` VALUES ('96', '80', '18', '0', '1495097975', '80-1');
INSERT INTO `efan_reply` VALUES ('97', '80', '18', '0', '1495098029', '80-2');
INSERT INTO `efan_reply` VALUES ('98', '0', '18', '5', '1495098038', '一般般');
INSERT INTO `efan_reply` VALUES ('99', '0', '18', '5', '1495098784', '12');
INSERT INTO `efan_reply` VALUES ('100', '0', '18', '5', '1495098786', '规划和国家高级慧根');
INSERT INTO `efan_reply` VALUES ('101', '0', '18', '8', '1495099175', '1321321313');
INSERT INTO `efan_reply` VALUES ('102', '101', '18', '0', '1495099810', '123');
INSERT INTO `efan_reply` VALUES ('103', '0', '18', '2', '1495522808', 'dfjskljfasdljfljlkjdlfajlsdjlkflsdjkfsdfads');
INSERT INTO `efan_reply` VALUES ('104', '103', '18', '0', '1495522822', 'lfdsfjklsajfsdklfjklsajf;dksajfdaskl;f sak;fjnk;lsaj;f ajfksa;fj dk;ljfadslj 啊代课老师分机多少六块腹肌；是；刻录机孔v');
INSERT INTO `efan_reply` VALUES ('105', '103', '18', '0', '1495522834', '其实这个鬼东西也就这么回事');
INSERT INTO `efan_reply` VALUES ('106', '0', '18', '3', '1499062226', '1`12`2');
INSERT INTO `efan_reply` VALUES ('107', '0', '18', '2', '1499062796', '1321313');

-- ----------------------------
-- Table structure for efan_user
-- ----------------------------
DROP TABLE IF EXISTS `efan_user`;
CREATE TABLE `efan_user` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `uid` int(3) NOT NULL,
  `name` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `student_ID` varchar(12) DEFAULT NULL COMMENT '学号',
  `college` varchar(255) DEFAULT NULL COMMENT '学院',
  `major` varchar(255) DEFAULT NULL COMMENT '专业',
  `class` varchar(255) DEFAULT NULL COMMENT '班级',
  `phone` varchar(11) DEFAULT NULL COMMENT '电话',
  `IDcard` varchar(18) DEFAULT NULL COMMENT '身份证',
  `email` varchar(40) DEFAULT NULL COMMENT '邮箱',
  `qq` varchar(11) DEFAULT NULL,
  `wechat` varchar(20) DEFAULT NULL COMMENT '微信',
  `group_email1` varchar(40) DEFAULT NULL COMMENT 'efan团队邮箱1',
  `group_email_password1` varchar(20) DEFAULT NULL COMMENT 'efan团队邮箱1密码',
  `group_email2` varchar(40) DEFAULT NULL COMMENT 'efan团队邮箱2',
  `group_email_password2` varchar(20) DEFAULT NULL COMMENT 'efan团队邮箱2密码',
  `url` varchar(30) NOT NULL,
  `permision` tinyint(2) NOT NULL DEFAULT '1',
  `state` int(1) NOT NULL DEFAULT '1',
  `passwordstate` int(1) NOT NULL DEFAULT '1' COMMENT '是否强制改密码，1-强制，0-不强制',
  `infostate` int(1) NOT NULL DEFAULT '1' COMMENT '是否强制修改个人信息，1-强制修改，0-不强制',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of efan_user
-- ----------------------------
INSERT INTO `efan_user` VALUES ('21', '18', '褚治广', 'e10adc3949ba59abbe56e057f20f883e', '041000', '计算中心', '计算中心', '计算中心', '13354165128', null, null, null, null, null, null, null, null, '', '10', '1', '0', '0');
INSERT INTO `efan_user` VALUES ('2', '38', '刘一博', 'e10adc3949ba59abbe56e057f20f883e', null, null, '过程装备与控制工程', null, '15904163233', null, null, null, null, null, null, null, null, '2013099/', '10', '1', '1', '1');
INSERT INTO `efan_user` VALUES ('3', '11', '任晨曦', 'e10adc3949ba59abbe56e057f20f883e', null, null, '经济统计学', null, '', null, null, null, null, null, null, null, null, '2013099/', '10', '1', '1', '1');
INSERT INTO `efan_user` VALUES ('8', '55', '孔佳依', 'e10adc3949ba59abbe56e057f20f883e', null, null, null, null, null, null, null, null, null, null, null, null, null, '', '10', '1', '1', '1');
INSERT INTO `efan_user` VALUES ('10', '16', '啦啦啦啦', 'e10adc3949ba59abbe56e057f20f883e', null, null, null, null, null, null, null, null, null, null, null, null, null, '', '10', '1', '1', '1');
INSERT INTO `efan_user` VALUES ('11', '90', '90', 'e10adc3949ba59abbe56e057f20f883e', null, null, null, null, null, null, null, null, null, null, null, null, null, '', '1', '1', '1', '1');
INSERT INTO `efan_user` VALUES ('12', '91', '91', 'e10adc3949ba59abbe56e057f20f883e', '120106071', '111', '111', '111', '18514410732', '210703199312212019', '123@123.com', '19613525', '123313123', null, null, null, null, '', '1', '1', '1', '0');
INSERT INTO `efan_user` VALUES ('13', '92', '刘一博', 'e10adc3949ba59abbe56e057f20f883e', '120106071', '1', '19', '过程123', '18514410732', '210703199312212019', 'baobeibobod@baidu.com', '19613525', 'baobeiboboda', null, null, null, null, '', '1', '1', '1', '0');
INSERT INTO `efan_user` VALUES ('14', '93', '93', 'e10adc3949ba59abbe56e057f20f883e', null, null, null, null, null, null, null, null, null, null, null, null, null, '', '1', '1', '1', '1');
INSERT INTO `efan_user` VALUES ('15', '94', '94', 'e10adc3949ba59abbe56e057f20f883e', null, null, null, null, null, null, null, null, null, null, null, null, null, '', '1', '1', '1', '1');
INSERT INTO `efan_user` VALUES ('16', '95', '95', 'e10adc3949ba59abbe56e057f20f883e', null, null, null, null, null, null, null, null, null, null, null, null, null, '', '1', '1', '1', '1');
INSERT INTO `efan_user` VALUES ('17', '96', '96', 'e10adc3949ba59abbe56e057f20f883e', null, null, null, null, null, null, null, null, null, null, null, null, null, '', '1', '1', '1', '1');
INSERT INTO `efan_user` VALUES ('18', '97', '刘一博', 'e10adc3949ba59abbe56e057f20f883e', '120106071', '11111', '1111', null, '', '210703199312212019', '123asd@qq.com', null, 'werfdd', null, null, null, null, '', '1', '1', '1', '0');
INSERT INTO `efan_user` VALUES ('19', '98', '刘一博', 'e10adc3949ba59abbe56e057f20f883e', '120106072', '机械', '过程', null, '', '210703199312212019', 'baobeiboboda@vip.qq.com', null, 'wechat', null, null, null, null, '', '1', '1', '1', '0');
INSERT INTO `efan_user` VALUES ('20', '99', '刘一博', 'e10adc3949ba59abbe56e057f20f883e', '120106073', '机械工程与自动化', '过程装备与控制工程', '过程123', '18514410732', '21070319931221201X', 'baobeiboboda@vip.qq.com', '19613525', 'baobeiboboda', null, null, null, null, '', '1', '1', '1', '0');

-- ----------------------------
-- Table structure for ymt_addons
-- ----------------------------
DROP TABLE IF EXISTS `ymt_addons`;
CREATE TABLE `ymt_addons` (
  `name` varchar(40) NOT NULL COMMENT '插件名或标识',
  `title` varchar(20) NOT NULL DEFAULT '' COMMENT '中文名',
  `description` text COMMENT '插件描述',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态',
  `config` text COMMENT '配置',
  `author` varchar(40) DEFAULT '' COMMENT '作者',
  `version` varchar(20) DEFAULT '' COMMENT '版本号',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '安装时间',
  `has_adminlist` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否有后台列表',
  PRIMARY KEY (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COMMENT='插件表';

-- ----------------------------
-- Records of ymt_addons
-- ----------------------------
INSERT INTO `ymt_addons` VALUES ('EditorForAdmin', '后台编辑器', '用于增强整站长文本的输入和显示', '1', '{\"editor_type\":\"2\",\"editor_wysiwyg\":\"1\",\"editor_height\":\"500px\",\"editor_resize_type\":\"1\"}', 'thinkphp', '0.1', '1383126253', '0');
INSERT INTO `ymt_addons` VALUES ('SiteStat', '站点统计信息', '统计站点的基础信息', '1', '{\"title\":\"\\u7cfb\\u7edf\\u4fe1\\u606f\",\"width\":\"1\",\"display\":\"1\",\"status\":\"0\"}', 'thinkphp', '0.1', '1379512015', '0');
INSERT INTO `ymt_addons` VALUES ('Editor', '前台编辑器', '用于增强整站长文本的输入和显示', '1', '{\"editor_type\":\"2\",\"editor_wysiwyg\":\"2\",\"editor_height\":\"300px\",\"editor_resize_type\":\"1\"}', 'thinkphp', '0.1', '1379830910', '0');
INSERT INTO `ymt_addons` VALUES ('Attachment', '附件', '用于文档模型上传附件', '1', 'null', 'thinkphp', '0.1', '1379842319', '1');
INSERT INTO `ymt_addons` VALUES ('SocialComment', '通用社交化评论', '集成了各种社交化评论插件，轻松集成到系统中。', '1', '{\"comment_type\":\"1\",\"comment_uid_youyan\":\"90040\",\"comment_short_name_duoshuo\":\"\",\"comment_form_pos_duoshuo\":\"buttom\",\"comment_data_list_duoshuo\":\"10\",\"comment_data_order_duoshuo\":\"asc\"}', 'thinkphp', '0.1', '0', '0');

-- ----------------------------
-- Table structure for ymt_article
-- ----------------------------
DROP TABLE IF EXISTS `ymt_article`;
CREATE TABLE `ymt_article` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `title` varchar(100) NOT NULL COMMENT '标题',
  `content` longtext NOT NULL COMMENT ' 内容',
  `thumb` varchar(200) DEFAULT NULL COMMENT '缩略图',
  `add_time` datetime NOT NULL COMMENT '添加时间',
  `category_id` int(11) NOT NULL COMMENT '栏目id',
  `summary` varchar(300) NOT NULL COMMENT '摘要',
  `update_time` datetime DEFAULT '0000-00-00 00:00:00' COMMENT '更改时间',
  `author` varchar(20) DEFAULT '' COMMENT '作者',
  `picture` varchar(200) DEFAULT NULL COMMENT '缩略图原图',
  PRIMARY KEY (`id`),
  KEY `category` (`category_id`) USING BTREE,
  FULLTEXT KEY `title` (`title`)
) ENGINE=MyISAM AUTO_INCREMENT=81 DEFAULT CHARSET=utf8 COMMENT='文章表';

-- ----------------------------
-- Records of ymt_article
-- ----------------------------
INSERT INTO `ymt_article` VALUES ('68', '77778', '<p>\r\n			&nbsp; &nbsp; &nbsp; 	 这里写你的初始化内容1\r\n			 &nbsp;&nbsp; 7777</p>', '/com/YMTFrameWork/Uploads/Article/2016-06-29/Thumb_577376f320bf3.png', '0000-00-00 00:00:00', '52', '7777', '0000-00-00 00:00:00', '7777', '/com/YMTFrameWork/Uploads/Article/2016-06-29/577376f320bf3.png');
INSERT INTO `ymt_article` VALUES ('61', '11', '<p>			&nbsp; &nbsp; &nbsp;	 </p><p>\r\n			&nbsp; &nbsp; &nbsp; 	 这里写你的初始化内容1\r\n			 &nbsp; &nbsp;</p>', '/com/publishmodule/Uploads/Article/2016-06-20/Thumb_5767a5e63e5de.jpg', '0000-00-00 00:00:00', '53', '11', '0000-00-00 00:00:00', '11', '/com/publishmodule/Uploads/Article/2016-06-20/5767a5e63e5de.jpg');
INSERT INTO `ymt_article` VALUES ('74', '221', '<p>\r\n			&nbsp; &nbsp; &nbsp; 	 这里写你的初始化内容1\r\n			 &nbsp; &nbsp;</p>', '/com/publishmodule/Uploads/Article/2016-06-22/Thumb_5769f778111cd.jpg', '0000-00-00 00:00:00', '53', '2', '0000-00-00 00:00:00', '2', '/com/publishmodule/Uploads/Article/2016-06-22/5769f778111cd.jpg');
INSERT INTO `ymt_article` VALUES ('75', '2222', '<p>\r\n			&nbsp; &nbsp; &nbsp; 	 这里写你的初始化内容1\r\n			 &nbsp;&nbsp; 222222</p>', '/com/publishmodule/Uploads/Article/2016-06-22/Thumb_5769f7a5462b9.jpg', '0000-00-00 00:00:00', '53', '222222', '0000-00-00 00:00:00', '22222', '/com/publishmodule/Uploads/Article/2016-06-22/5769f7a5462b9.jpg');
INSERT INTO `ymt_article` VALUES ('76', '333', '<p>\r\n			&nbsp; &nbsp; &nbsp; 	 这里写你的初始化内容1\r\n			 &nbsp;&nbsp; 333</p>', '/com/publishmodule/Uploads/Article/2016-06-22/Thumb_5769f9258324f.jpg', '0000-00-00 00:00:00', '53', '333', '0000-00-00 00:00:00', '333', '/com/publishmodule/Uploads/Article/2016-06-22/5769f9258324f.jpg');
INSERT INTO `ymt_article` VALUES ('77', '切切切', '<p>\r\n			&nbsp; &nbsp; &nbsp; 	 这里写你的初始化内容1\r\n			 &nbsp;&nbsp; 1111</p>', '/com/publishmodule/Uploads/Article/2016-06-22/Thumb_5769f9e834d9d.jpg', '2016-06-22 10:36:56', '53', 'qqq切切切', '0000-00-00 00:00:00', '切切切', '/com/publishmodule/Uploads/Article/2016-06-22/5769f9e834d9d.jpg');
INSERT INTO `ymt_article` VALUES ('78', '我问问', '<p>\r\n			&nbsp; &nbsp; &nbsp; 	 这里写你的初始化内容1\r\n			 &nbsp;&nbsp; www</p>', '/com/publishmodule/Uploads/Article/2016-06-22/Thumb_5769fae4c06a8.jpg', '0000-00-00 00:00:00', '53', '我问问', '0000-00-00 00:00:00', '我问问', '/com/publishmodule/Uploads/Article/2016-06-22/5769fae4c06a8.jpg');
INSERT INTO `ymt_article` VALUES ('79', '额额额', '<p>\r\n			&nbsp; &nbsp; &nbsp; 	 这里写你的初始化内容1\r\n			 &nbsp; &nbsp;</p>', '/com/publishmodule/Uploads/Article/2016-06-22/Thumb_5769fb69edc5d.jpg', '2016-06-22 10:43:40', '53', '热额额', '0000-00-00 00:00:00', '额额额', '/com/publishmodule/Uploads/Article/2016-06-22/5769fb69edc5d.jpg');
INSERT INTO `ymt_article` VALUES ('80', 'aaa', '<p>\r\n			&nbsp; &nbsp; &nbsp; 	 这里写你的初始化内容1\r\n			 &nbsp;&nbsp; aaaaa<img alt=\"u1949.png\" src=\"/ueditor/php/upload/image/20160628/1467100720140451.png\" title=\"1467100720140451.png\"/></p>', '/com/publishmodule2/Uploads/Article/2016-06-28/Thumb_57722e28ef4dc.png', '2016-06-28 15:58:15', '52', 'aaa', '0000-00-00 00:00:00', 'aaa', '/com/publishmodule2/Uploads/Article/2016-06-28/57722e28ef4dc.png');

-- ----------------------------
-- Table structure for ymt_auth_group
-- ----------------------------
DROP TABLE IF EXISTS `ymt_auth_group`;
CREATE TABLE `ymt_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户组id,自增主键',
  `module` varchar(20) NOT NULL COMMENT '用户组所属模块',
  `type` tinyint(4) NOT NULL COMMENT '组类型',
  `title` char(20) NOT NULL DEFAULT '' COMMENT '用户组中文名称',
  `description` varchar(80) NOT NULL DEFAULT '' COMMENT '描述信息',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '用户组状态：为1正常，为0禁用,-1为删除',
  `rules` varchar(500) NOT NULL DEFAULT '' COMMENT '用户组拥有的规则id，多个规则 , 隔开',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ymt_auth_group
-- ----------------------------
INSERT INTO `ymt_auth_group` VALUES ('1', 'admin', '1', '超级管理员组', '拥有最高的权限', '1', '1,2,7,8,9,10,11,12,13,14,15,16,17,18,20,21,22,23,24,25,28,29,30,31,32,33,34,35,36,37,38,39,40,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,79,80,81,82,83,84,86,87,89,90,91,92,93,94,95,100,102,103');

-- ----------------------------
-- Table structure for ymt_chose_form
-- ----------------------------
DROP TABLE IF EXISTS `ymt_chose_form`;
CREATE TABLE `ymt_chose_form` (
  `ycfid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(255) CHARACTER SET utf8 NOT NULL COMMENT '标题',
  `choice` char(255) CHARACTER SET utf8 DEFAULT '' COMMENT '选项',
  `remark` char(255) CHARACTER SET utf8 DEFAULT '' COMMENT '提示',
  `flag` smallint(1) DEFAULT NULL COMMENT '1:为单选；2：多选；3：下拉；4：单行文本；5：多行文本',
  `is_must` smallint(1) DEFAULT '0' COMMENT '是否必须填。0：不必须；1:必须',
  `at_least` smallint(1) DEFAULT '1' COMMENT '多选最少填几项',
  `at_most` smallint(1) DEFAULT '1' COMMENT '多选最多填几项',
  `default` smallint(1) DEFAULT '0' COMMENT '默认选项',
  `is_repeat` smallint(1) DEFAULT '0' COMMENT '（主要针对单行文本）是否允许和已有数据重复。0：允许；1：不允许',
  `right_answer` char(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '正确答案，0：不正确,1：为正确',
  `number` smallint(6) DEFAULT NULL COMMENT '题目编号',
  PRIMARY KEY (`ycfid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='单选多选';

-- ----------------------------
-- Records of ymt_chose_form
-- ----------------------------
INSERT INTO `ymt_chose_form` VALUES ('1', '爱好', '', '', null, '0', '1', '1', '0', '0', null, null);

-- ----------------------------
-- Table structure for ymt_classify
-- ----------------------------
DROP TABLE IF EXISTS `ymt_classify`;
CREATE TABLE `ymt_classify` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `pid` int(10) NOT NULL,
  `classify` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ymt_classify
-- ----------------------------
INSERT INTO `ymt_classify` VALUES ('1', '0', '华为');
INSERT INTO `ymt_classify` VALUES ('2', '1', '手机111');
INSERT INTO `ymt_classify` VALUES ('3', '2', '魅族111');
INSERT INTO `ymt_classify` VALUES ('5', '0', '小米');
INSERT INTO `ymt_classify` VALUES ('24', '0', '餐饮');
INSERT INTO `ymt_classify` VALUES ('23', '2', '44');
INSERT INTO `ymt_classify` VALUES ('11', '1', '电视');
INSERT INTO `ymt_classify` VALUES ('12', '11', '4k电视');
INSERT INTO `ymt_classify` VALUES ('13', '2', '魅族22222222');
INSERT INTO `ymt_classify` VALUES ('14', '5', '小米下面二级');
INSERT INTO `ymt_classify` VALUES ('15', '14', '2aa222');
INSERT INTO `ymt_classify` VALUES ('20', '0', '111111');
INSERT INTO `ymt_classify` VALUES ('22', '0', '55');
INSERT INTO `ymt_classify` VALUES ('21', '20', '214234');
INSERT INTO `ymt_classify` VALUES ('25', '24', '菜品');
INSERT INTO `ymt_classify` VALUES ('26', '24', '饭品');
INSERT INTO `ymt_classify` VALUES ('27', '24', '饮品');
INSERT INTO `ymt_classify` VALUES ('28', '24', '甜点');
INSERT INTO `ymt_classify` VALUES ('29', '24', '其他');

-- ----------------------------
-- Table structure for ymt_column
-- ----------------------------
DROP TABLE IF EXISTS `ymt_column`;
CREATE TABLE `ymt_column` (
  `column_id` smallint(2) unsigned NOT NULL AUTO_INCREMENT COMMENT '栏目编号id',
  `column_title` varchar(10) CHARACTER SET utf8 NOT NULL COMMENT '栏目标题',
  `column_pid` smallint(2) NOT NULL DEFAULT '0' COMMENT '父级id，顶级为：0；非0时对应column_id',
  `app_menu` smallint(4) NOT NULL DEFAULT '0' COMMENT '是否是app菜单;0:不是1:是',
  `app_color_style` varchar(16) COLLATE utf8_bin DEFAULT NULL COMMENT 'app菜单颜色值;如#cccccc',
  `app_icon_url` varchar(200) COLLATE utf8_bin DEFAULT NULL COMMENT 'icon的url',
  `sort` tinyint(4) NOT NULL DEFAULT '0' COMMENT '排序',
  `app_web_url` varchar(500) COLLATE utf8_bin DEFAULT NULL COMMENT '配置app打开的页面',
  PRIMARY KEY (`column_id`),
  KEY `column_pid` (`column_pid`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='栏目表';

-- ----------------------------
-- Records of ymt_column
-- ----------------------------
INSERT INTO `ymt_column` VALUES ('1', '新闻动态', '0', '1', '#4CAF50', '/Uploads/Picture/accounts.png', '0', 'http://m.dangdang.com/');
INSERT INTO `ymt_column` VALUES ('52', '公司动态', '1', '1', '#4CAF50', '/Uploads/Picture//apps.png', '1', 'http://info.3g.qq.com/g/s?aid=index&g_ut=3&from=iphone_qqcom&sid=00');
INSERT INTO `ymt_column` VALUES ('53', '团队活动', '1', '1', '#4CAF50', '/Uploads/Picture//dots.png', '2', 'http://sale.jd.com/m/act/4qhbCYTzysKNfk2.html');
INSERT INTO `ymt_column` VALUES ('61', '24', '1', '0', '1', '/com/YMTFrameWork/Uploads/Column/2016-06-30/57751032aad25.png', '2', null);
INSERT INTO `ymt_column` VALUES ('59', '666', '1', '0', '66', '/com/YMTFrameWork/Uploads/Column/2016-07-01/5775d1b57c7ea.jpg', '4', null);

-- ----------------------------
-- Table structure for ymt_config
-- ----------------------------
DROP TABLE IF EXISTS `ymt_config`;
CREATE TABLE `ymt_config` (
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '配置名称',
  `type` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '配置类型1:文本；4:下拉列表',
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '配置说明',
  `group` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '配置分组',
  `extra` varchar(255) NOT NULL DEFAULT '' COMMENT '配置值',
  `remark` varchar(100) NOT NULL COMMENT '配置说明',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态',
  `value` text NOT NULL COMMENT '配置值',
  `sort` smallint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`name`),
  UNIQUE KEY `uk_name` (`name`),
  KEY `type` (`type`),
  KEY `group` (`group`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ymt_config
-- ----------------------------
INSERT INTO `ymt_config` VALUES ('WEB_SITE_TITLE', '1', '网站标题', '1', '', '网站标题前台显示标题', '1378898976', '1465279839', '1', '后台管理系统', '0');
INSERT INTO `ymt_config` VALUES ('WEB_SITE_DESCRIPTION', '2', '网站描述', '1', '', '网站搜索引擎描述', '1378898976', '1379235841', '1', '猿码头后台管理系统', '1');
INSERT INTO `ymt_config` VALUES ('WEB_SITE_KEYWORD', '2', '网站关键字', '1', '', '网站搜索引擎关键字', '1378898976', '1381390100', '1', '猿码头11', '8');
INSERT INTO `ymt_config` VALUES ('WEB_SITE_ICP', '1', '网站备案号', '1', '', '如\"京ICP备14013455号-6\"', '1378900335', '1379235859', '1', '22ed', '9');
INSERT INTO `ymt_config` VALUES ('DOCUMENT_POSITION', '3', '文档推荐位', '2', '', '文档推荐位，推荐到多个位置KEY值相加即可', '1379053380', '1379235329', '1', '1:列表页推荐\r\n2:频道页推荐\r\n4:网站首页推荐', '3');
INSERT INTO `ymt_config` VALUES ('DOCUMENT_DISPLAY', '3', '文档可见性', '2', '', '文章可见性仅影响前台显示，后台不收影响', '1379056370', '1379235322', '1', '0:所有人可见\r\n1:仅注册会员可见\r\n2:仅管理员可见', '4');
INSERT INTO `ymt_config` VALUES ('OPEN_DRAFTBOX', '4', '是否开启草稿功能', '2', '0:关闭草稿功能\r\n1:开启草稿功能\r\n', '新增文章时的草稿功能配置', '1379484332', '1379484591', '1', '1', '1');
INSERT INTO `ymt_config` VALUES ('DRAFT_AOTOSAVE_INTERVAL', '0', '自动保存草稿时间', '2', '', '自动保存草稿的时间间隔，单位：秒', '1379484574', '1386143323', '1', '60', '2');
INSERT INTO `ymt_config` VALUES ('LIST_ROWS', '0', '后台每页记录数', '2', '', '后台数据每页显示记录数', '1379503896', '1380427745', '1', '10', '10');
INSERT INTO `ymt_config` VALUES ('USER_ALLOW_REGISTER', '4', '是否允许用户注册', '3', '0:关闭注册\r\n1:允许注册', '是否开放用户注册', '1379504487', '1379504580', '1', '1', '3');
INSERT INTO `ymt_config` VALUES ('DATA_BACKUP_PATH', '1', '数据库备份根路径', '4', '', '路径必须以 / 结尾', '1381482411', '1381482411', '1', './Data/', '5');
INSERT INTO `ymt_config` VALUES ('DATA_BACKUP_PART_SIZE', '0', '数据库备份卷大小', '4', '', '该值用于限制压缩后的分卷最大长度。单位：B；建议设置20M', '1381482488', '1381729564', '1', '20971520', '7');
INSERT INTO `ymt_config` VALUES ('DATA_BACKUP_COMPRESS', '4', '数据库备份文件是否启用压缩', '4', '0:不压缩\r\n1:启用压缩', '压缩备份文件需要PHP环境支持gzopen,gzwrite函数', '1381713345', '1381729544', '1', '1', '9');
INSERT INTO `ymt_config` VALUES ('DATA_BACKUP_COMPRESS_LEVEL', '4', '数据库备份文件压缩级别', '4', '1:普通\r\n4:一般\r\n9:最高', '数据库备份文件的压缩级别，该配置在开启压缩时生效', '1381713408', '1381713408', '1', '9', '10');
INSERT INTO `ymt_config` VALUES ('ALLOW_VISIT', '3', '不受限控制器方法', '0', '', '', '1386644047', '1386644741', '1', '0:article/draftbox\r\n1:article/mydocument\r\n2:Category/tree\r\n3:Index/verify\r\n4:file/upload\r\n5:file/download\r\n6:user/updatePassword\r\n7:user/updateNickname\r\n8:user/submitPassword\r\n9:user/submitNickname\r\n10:file/uploadpicture', '0');
INSERT INTO `ymt_config` VALUES ('DENY_VISIT', '3', '超管专限控制器方法', '0', '', '仅超级管理员可访问的控制器方法', '1386644141', '1386644659', '1', '0:Addons/addhook\r\n1:Addons/edithook\r\n2:Addons/delhook\r\n3:Addons/updateHook\r\n4:Admin/getMenus\r\n5:Admin/recordList\r\n6:AuthManager/updateRules\r\n7:AuthManager/tree', '0');
INSERT INTO `ymt_config` VALUES ('REPLY_LIST_ROWS', '0', '回复列表每页条数', '2', '', '', '1386645376', '1387178083', '1', '10', '0');
INSERT INTO `ymt_config` VALUES ('ADMIN_ALLOW_IP', '2', '后台允许访问IP', '4', '', '多个用逗号分隔，如果不配置表示不限制IP访问', '1387165454', '1387165553', '1', '', '12');
INSERT INTO `ymt_config` VALUES ('APPSTARTIMAGE', '5', 'APP开机启动图片', '4', '', '720*1280', '1387165454', '1387165553', '1', '/Uploads/Picture/2016-07-14/578744318391d.jpg', '13');
INSERT INTO `ymt_config` VALUES ('APPSHOWTITLEBAR', '4', 'APP是否显示标题栏', '4', '0:显示\r\n1:不显示', '针对手机APP配置', '1387165454', '1387165553', '1', '0', '14');
INSERT INTO `ymt_config` VALUES ('APPSHOWPOSITION', '4', 'APP菜单显示方式', '4', '1:底部\r\n2:侧滑栏', '针对手机APP设置', '0', '0', '1', '1', '15');

-- ----------------------------
-- Table structure for ymt_email_record
-- ----------------------------
DROP TABLE IF EXISTS `ymt_email_record`;
CREATE TABLE `ymt_email_record` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `email` varchar(200) NOT NULL COMMENT '邮箱',
  `code` varchar(100) NOT NULL COMMENT '随机码',
  `user_id` int(11) DEFAULT NULL COMMENT '发送user_id',
  `expire_time` int(11) DEFAULT NULL COMMENT '失效时间',
  `add_time` datetime NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ymt_email_record
-- ----------------------------

-- ----------------------------
-- Table structure for ymt_good
-- ----------------------------
DROP TABLE IF EXISTS `ymt_good`;
CREATE TABLE `ymt_good` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gid` varchar(20) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `lable` varchar(20) NOT NULL,
  `classify` varchar(20) NOT NULL,
  `state` int(2) NOT NULL,
  `content` text COMMENT '商品内容',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ymt_good
-- ----------------------------
INSERT INTO `ymt_good` VALUES ('10', '1', '1', '1', '1.00', '1', '14', '1', null);
INSERT INTO `ymt_good` VALUES ('11', '555', '', '555', '555.00', '2,3,5', '14', '1', null);
INSERT INTO `ymt_good` VALUES ('4', '0', '', '测试4', '12.70', '2,5', '2,3', '1', '<p>555<br/></p>');
INSERT INTO `ymt_good` VALUES ('16', '66', '/orderAndGoodsModule/Uploads/Goods/2016-07-21/Thumb_57907826b6c3d.png', '66', '66.00', '2,23', '3', '-1', '<p>666<br/></p>');
INSERT INTO `ymt_good` VALUES ('22', '', '', '辣菜', '21.30', '', '25', '0', null);
INSERT INTO `ymt_good` VALUES ('23', '', '', '盖饭', '22.00', '', '26', '0', null);
INSERT INTO `ymt_good` VALUES ('24', '', '', '炒饭', '16.50', '', '26', '0', null);
INSERT INTO `ymt_good` VALUES ('20', '9999', '', '99', '9999.00', '2,5,8', '21', '-1', '<p>\n			99999999 8888888888<br/></p>');
INSERT INTO `ymt_good` VALUES ('21', '', '', '甜菜', '11.50', '', '25', '0', null);
INSERT INTO `ymt_good` VALUES ('25', '', '', '啤酒', '3.30', '', '27', '0', null);
INSERT INTO `ymt_good` VALUES ('26', '', '', '可乐', '3.50', '', '27', '0', null);
INSERT INTO `ymt_good` VALUES ('27', '', '', '糖块', '2.00', '', '28', '0', null);
INSERT INTO `ymt_good` VALUES ('28', '', '', '拔丝地瓜', '12.00', '', '28', '0', null);

-- ----------------------------
-- Table structure for ymt_hooks
-- ----------------------------
DROP TABLE IF EXISTS `ymt_hooks`;
CREATE TABLE `ymt_hooks` (
  `name` varchar(40) NOT NULL COMMENT '钩子名称',
  `description` text NOT NULL COMMENT '描述',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '类型',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ymt_hooks
-- ----------------------------
INSERT INTO `ymt_hooks` VALUES ('pageHeader', '页面header钩子，一般用于加载插件CSS文件和代码', '1', '0');
INSERT INTO `ymt_hooks` VALUES ('pageFooter', '页面footer钩子，一般用于加载插件JS文件和JS代码', '0', '1466152341');
INSERT INTO `ymt_hooks` VALUES ('documentEditForm', '添加编辑表单的 扩展内容钩子', '1', '0');
INSERT INTO `ymt_hooks` VALUES ('documentDetailAfter', '文档末尾显示', '0', '0');
INSERT INTO `ymt_hooks` VALUES ('documentDetailBefore', '页面内容前显示用钩子', '1', '0');
INSERT INTO `ymt_hooks` VALUES ('documentSaveComplete', '保存文档数据后的扩展钩子', '2', '0');
INSERT INTO `ymt_hooks` VALUES ('documentEditFormContent', '添加编辑表单的内容显示钩子', '1', '0');
INSERT INTO `ymt_hooks` VALUES ('adminArticleEdit', '后台内容编辑页编辑器', '1', '1378982734');
INSERT INTO `ymt_hooks` VALUES ('AdminIndex', '首页小格子个性化显示', '0', '1466567123');
INSERT INTO `ymt_hooks` VALUES ('topicComment', '评论提交方式扩展钩子。', '1', '1380163518');
INSERT INTO `ymt_hooks` VALUES ('app_begin', '应用开始', '2', '1384481614');

-- ----------------------------
-- Table structure for ymt_hooks_addons
-- ----------------------------
DROP TABLE IF EXISTS `ymt_hooks_addons`;
CREATE TABLE `ymt_hooks_addons` (
  `hook_name` varchar(40) NOT NULL COMMENT '钩子名称',
  `addon_name` varchar(40) NOT NULL COMMENT '插件名称',
  `sort` int(11) NOT NULL COMMENT '排序',
  PRIMARY KEY (`hook_name`,`addon_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ymt_hooks_addons
-- ----------------------------
INSERT INTO `ymt_hooks_addons` VALUES ('pageFooter', 'ReturnTop', '0');
INSERT INTO `ymt_hooks_addons` VALUES ('documentEditForm', 'Attachment', '0');
INSERT INTO `ymt_hooks_addons` VALUES ('documentDetailAfter', 'SocialComment', '1');
INSERT INTO `ymt_hooks_addons` VALUES ('documentDetailAfter', 'Attachment', '0');
INSERT INTO `ymt_hooks_addons` VALUES ('documentSaveComplete', 'Attachment', '0');
INSERT INTO `ymt_hooks_addons` VALUES ('documentEditFormContent', 'Editor', '0');
INSERT INTO `ymt_hooks_addons` VALUES ('adminArticleEdit', 'EditorForAdmin', '0');
INSERT INTO `ymt_hooks_addons` VALUES ('topicComment', 'Editor', '0');
INSERT INTO `ymt_hooks_addons` VALUES ('AdminIndex', 'SiteStat', '0');

-- ----------------------------
-- Table structure for ymt_lable
-- ----------------------------
DROP TABLE IF EXISTS `ymt_lable`;
CREATE TABLE `ymt_lable` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ymt_lable
-- ----------------------------
INSERT INTO `ymt_lable` VALUES ('2', '手机123');
INSERT INTO `ymt_lable` VALUES ('3', '苹果');
INSERT INTO `ymt_lable` VALUES ('5', '测试');
INSERT INTO `ymt_lable` VALUES ('8', '测试22222');
INSERT INTO `ymt_lable` VALUES ('23', '222');

-- ----------------------------
-- Table structure for ymt_list_form
-- ----------------------------
DROP TABLE IF EXISTS `ymt_list_form`;
CREATE TABLE `ymt_list_form` (
  `ylfid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '标题',
  `record` smallint(6) DEFAULT '0' COMMENT '表单数据',
  `chose_id` char(255) CHARACTER SET utf8 DEFAULT '' COMMENT '题目id',
  PRIMARY KEY (`ylfid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of ymt_list_form
-- ----------------------------
INSERT INTO `ymt_list_form` VALUES ('1', '问卷1', '111', '1,2,3,4');
INSERT INTO `ymt_list_form` VALUES ('4', '啊啊啊啊', '33', '1,2,3,4');

-- ----------------------------
-- Table structure for ymt_member
-- ----------------------------
DROP TABLE IF EXISTS `ymt_member`;
CREATE TABLE `ymt_member` (
  `uid` int(10) unsigned NOT NULL COMMENT '员工ID',
  `nickname` char(16) NOT NULL DEFAULT '' COMMENT '昵称',
  `sex` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '性别',
  `birthday` date NOT NULL DEFAULT '0000-00-00' COMMENT '生日',
  `qq` char(10) NOT NULL DEFAULT '' COMMENT 'qq号',
  `score` mediumint(8) NOT NULL DEFAULT '0' COMMENT '用户积分',
  `login` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '登录次数',
  `reg_ip` bigint(20) NOT NULL DEFAULT '0' COMMENT '注册IP',
  `reg_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '注册时间',
  `last_login_ip` bigint(20) NOT NULL DEFAULT '0' COMMENT '最后登录IP',
  `last_login_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '会员状态',
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  PRIMARY KEY (`id`),
  KEY `status` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='员工纪录表';

-- ----------------------------
-- Records of ymt_member
-- ----------------------------
INSERT INTO `ymt_member` VALUES ('1', 'admin', '0', '0000-00-00', '', '0', '1', '0', '1465888206', '0', '1465888206', '1', '1');

-- ----------------------------
-- Table structure for ymt_sms_code
-- ----------------------------
DROP TABLE IF EXISTS `ymt_sms_code`;
CREATE TABLE `ymt_sms_code` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `mobile` varchar(32) NOT NULL COMMENT '手机号码',
  `sms_code` varchar(10) NOT NULL COMMENT '短信验证码',
  `user_id` int(11) DEFAULT NULL COMMENT '修改手机用户的id',
  `expire_time` int(11) NOT NULL COMMENT '失效时间',
  `add_time` datetime NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ymt_sms_code
-- ----------------------------
INSERT INTO `ymt_sms_code` VALUES ('1', '18911376138', '1627', null, '1466762084', '2016-06-24 17:44:00');
INSERT INTO `ymt_sms_code` VALUES ('2', '18911376138', '8761', null, '1467022801', '2016-06-27 18:10:00');
INSERT INTO `ymt_sms_code` VALUES ('3', '18515367281', '1840', null, '1467024998', '2016-06-27 18:46:00');
INSERT INTO `ymt_sms_code` VALUES ('4', '18515367281', '3761', null, '1467035187', '2016-06-27 21:36:00');
INSERT INTO `ymt_sms_code` VALUES ('5', '18515367281', '1200', null, '1467079151', '2016-06-28 09:49:00');
INSERT INTO `ymt_sms_code` VALUES ('6', '18515367281', '2690', null, '1467098754', '2016-06-28 15:15:00');
INSERT INTO `ymt_sms_code` VALUES ('7', '18515367281', '2499', null, '1467099129', '2016-06-28 15:22:00');
INSERT INTO `ymt_sms_code` VALUES ('8', '18515367281', '6286', null, '1467099303', '2016-06-28 15:25:00');
INSERT INTO `ymt_sms_code` VALUES ('9', '18515367281', '3073', null, '1467100864', '2016-06-28 15:51:00');
INSERT INTO `ymt_sms_code` VALUES ('10', '18911376138', '8165', null, '1467108207', '2016-06-28 17:53:00');
INSERT INTO `ymt_sms_code` VALUES ('11', '18515367281', '6924', null, '1467164738', '2016-06-29 09:35:00');
INSERT INTO `ymt_sms_code` VALUES ('12', '18515367281', '2293', null, '1467164975', '2016-06-29 09:39:00');
INSERT INTO `ymt_sms_code` VALUES ('13', '18515367281', '7460', null, '1467165637', '2016-06-29 09:50:00');
INSERT INTO `ymt_sms_code` VALUES ('14', '18515367281', '7602', null, '1467166774', '2016-06-29 10:09:00');
INSERT INTO `ymt_sms_code` VALUES ('15', '18515367281', '2621', null, '1467186246', '2016-06-29 15:34:00');
INSERT INTO `ymt_sms_code` VALUES ('16', '18678742048', '2819', null, '1467190968', '2016-06-29 16:52:00');
INSERT INTO `ymt_sms_code` VALUES ('17', '18678742048', '9284', null, '1467191047', '2016-06-29 16:54:00');
INSERT INTO `ymt_sms_code` VALUES ('18', '13188827213', '9120', null, '1467192012', '2016-06-29 17:10:00');
INSERT INTO `ymt_sms_code` VALUES ('19', '18515367281', '6009', null, '1467280872', '2016-06-30 17:51:00');
INSERT INTO `ymt_sms_code` VALUES ('20', '18515367281', '1455', null, '1467281030', '2016-06-30 17:53:00');
INSERT INTO `ymt_sms_code` VALUES ('21', '18515367281', '6971', null, '1467281953', '2016-06-30 18:09:00');
INSERT INTO `ymt_sms_code` VALUES ('22', '18515367281', '6374', null, '1467282231', '2016-06-30 18:13:00');
INSERT INTO `ymt_sms_code` VALUES ('23', '18515367281', '4092', null, '1467282719', '2016-06-30 18:21:00');
INSERT INTO `ymt_sms_code` VALUES ('24', '18515367281', '7334', null, '1467337673', '2016-07-01 09:37:00');
INSERT INTO `ymt_sms_code` VALUES ('25', '18515367281', '7589', null, '1467337984', '2016-07-01 09:43:00');
INSERT INTO `ymt_sms_code` VALUES ('26', '18515367281', '1753', null, '1467338200', '2016-07-01 09:46:00');
INSERT INTO `ymt_sms_code` VALUES ('27', '18515367281', '5471', null, '1467338313', '2016-07-01 09:48:00');
INSERT INTO `ymt_sms_code` VALUES ('28', '18515367281', '5887', null, '1467339189', '2016-07-01 10:03:00');
INSERT INTO `ymt_sms_code` VALUES ('29', '18515367283', '4537', null, '1467343775', '2016-07-01 11:19:00');
INSERT INTO `ymt_sms_code` VALUES ('30', '18515367282', '3376', null, '1467355125', '2016-07-01 14:28:00');
INSERT INTO `ymt_sms_code` VALUES ('31', '18515367282', '8710', null, '1467355156', '2016-07-01 14:29:00');
INSERT INTO `ymt_sms_code` VALUES ('32', '18515367281', '1883', null, '1467552364', '2016-07-03 21:16:00');
INSERT INTO `ymt_sms_code` VALUES ('33', '18678742048', '1048', null, '1467553865', '2016-07-03 21:41:00');

-- ----------------------------
-- Table structure for ymt_txt_form
-- ----------------------------
DROP TABLE IF EXISTS `ymt_txt_form`;
CREATE TABLE `ymt_txt_form` (
  `ytf` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(255) CHARACTER SET utf8 NOT NULL COMMENT '标题',
  `remark` char(255) CHARACTER SET utf8 DEFAULT '' COMMENT '提示',
  `default` char(255) CHARACTER SET utf8 DEFAULT '' COMMENT '默认值',
  `is_must` smallint(1) DEFAULT '0' COMMENT '是否必须填。0：不必须；1:必须',
  `at_least` smallint(1) DEFAULT '1' COMMENT '最少填几个字符',
  `at_most` smallint(1) DEFAULT '1' COMMENT '最多填几个字符',
  `is_repeat` smallint(1) DEFAULT '0' COMMENT '是否允许和已有数据重复。0：允许；1：不允许',
  `flag` smallint(1) DEFAULT NULL COMMENT '1:单行文本；2：多行文本',
  PRIMARY KEY (`ytf`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of ymt_txt_form
-- ----------------------------

-- ----------------------------
-- Table structure for ymt_ucenter_member
-- ----------------------------
DROP TABLE IF EXISTS `ymt_ucenter_member`;
CREATE TABLE `ymt_ucenter_member` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `username` char(16) NOT NULL COMMENT '登录名',
  `password` char(32) NOT NULL COMMENT '密码',
  `email` char(32) NOT NULL COMMENT '邮箱',
  `mobile` char(15) NOT NULL COMMENT '手机',
  `reg_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '注册时间',
  `reg_ip` bigint(20) NOT NULL DEFAULT '0' COMMENT '注册IP',
  `last_login_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  `last_login_ip` bigint(20) NOT NULL DEFAULT '0' COMMENT '最后登录IP',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(4) DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `status` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='员工表';

-- ----------------------------
-- Records of ymt_ucenter_member
-- ----------------------------
INSERT INTO `ymt_ucenter_member` VALUES ('1', 'admin', '53b5618eb6a24d6569b46a38dd6eb9b3', '820471571@qq.com', '', '1465888206', '0', '1469608624', '0', '1465888206', '1');

-- ----------------------------
-- Table structure for ymt_user
-- ----------------------------
DROP TABLE IF EXISTS `ymt_user`;
CREATE TABLE `ymt_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mobile` varchar(12) COLLATE utf8_bin DEFAULT NULL COMMENT '用户名 手机号',
  `password` varchar(50) COLLATE utf8_bin DEFAULT NULL COMMENT '用户密码',
  `register_time` datetime NOT NULL,
  `third_name` varchar(50) COLLATE utf8_bin DEFAULT NULL COMMENT 'qq昵称 或者微博昵称',
  `nickname` varchar(50) CHARACTER SET utf8 DEFAULT '' COMMENT '昵称',
  `signature` varchar(50) COLLATE utf8_bin DEFAULT NULL COMMENT '个性签名',
  `birthday` datetime DEFAULT NULL COMMENT '生日',
  `sex` varchar(2) COLLATE utf8_bin DEFAULT NULL COMMENT '性别',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of ymt_user
-- ----------------------------
INSERT INTO `ymt_user` VALUES ('1', '18515367282', '111111', '0000-00-00 00:00:00', null, '', null, null, null);
INSERT INTO `ymt_user` VALUES ('2', '18515367282', '111111', '0000-00-00 00:00:00', null, '', null, null, null);
INSERT INTO `ymt_user` VALUES ('3', '18515367282', '111111', '0000-00-00 00:00:00', null, '', null, null, null);
INSERT INTO `ymt_user` VALUES ('4', '18515367282', '3ca79d9091570f39eb507af718d59f6e', '0000-00-00 00:00:00', null, '', null, null, null);
INSERT INTO `ymt_user` VALUES ('12', '18515367281', '6e260dfcb268f3e0107f090437f1e46b', '2016-07-03 21:40:56', null, '地方', ' 地方', '0000-00-00 00:00:00', '保密');
INSERT INTO `ymt_user` VALUES ('6', '13188827213', '6e260dfcb268f3e0107f090437f1e46b', '2016-06-29 17:10:37', null, '', null, null, null);
INSERT INTO `ymt_user` VALUES ('8', '18515367281', '6e260dfcb268f3e0107f090437f1e46b', '2016-07-01 14:27:32', null, '', null, null, null);
INSERT INTO `ymt_user` VALUES ('9', '18515367281', '6e260dfcb268f3e0107f090437f1e46b', '2016-07-03 21:16:53', null, '', null, null, null);
INSERT INTO `ymt_user` VALUES ('10', '18515367281', '6e260dfcb268f3e0107f090437f1e46b', '2016-07-03 21:29:24', null, '', null, null, null);
INSERT INTO `ymt_user` VALUES ('26', '18515367281', '6e260dfcb268f3e0107f090437f1e46b', '2016-07-03 21:39:39', null, '', null, null, null);
INSERT INTO `ymt_user` VALUES ('13', '18678742048', '6e260dfcb268f3e0107f090437f1e46b', '2016-07-03 21:42:23', null, '', null, null, null);

-- ----------------------------
-- Table structure for ymt_user_cookie
-- ----------------------------
DROP TABLE IF EXISTS `ymt_user_cookie`;
CREATE TABLE `ymt_user_cookie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL COMMENT '用户id 与tb_user 的id关联',
  `newid` varchar(50) DEFAULT NULL COMMENT '生成随机的id ，存入cookie中，与userid一对一关系',
  `expire_time` int(11) DEFAULT NULL COMMENT '失效时间',
  `user_type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '用户类型0:用户；1员工',
  PRIMARY KEY (`id`),
  UNIQUE KEY `index_newid` (`newid`),
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ymt_user_cookie
-- ----------------------------
INSERT INTO `ymt_user_cookie` VALUES ('1', '8', '5773c12302b56', '1467218274', '0');
INSERT INTO `ymt_user_cookie` VALUES ('2', '26', '5774cc84cf293', '1467286724', '0');
INSERT INTO `ymt_user_cookie` VALUES ('3', '12', '577a0a90b5b46', '1467630288', '0');
