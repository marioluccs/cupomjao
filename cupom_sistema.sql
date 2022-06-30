-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30-Jun-2022 às 19:54
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cupom_sistema`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administracao`
--

CREATE TABLE `administracao` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `permissao` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `administracao`
--

INSERT INTO `administracao` (`id`, `nome`, `email`, `user`, `pass`, `permissao`, `status`) VALUES
(12, 'Agência CodeLabs', 'atendimento@agenciacodelabs.com.br', 'codelabs', '5c38d8db724769f112d69f7266e830ec', '', 1),
(14, 'Demonstrativo CodeLabs', 'atendimento@agenciacodelabs.com.br', 'admin', '0192023a7bbd73250516f069df18b500', '', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `banners`
--

CREATE TABLE `banners` (
  `id` int(99) NOT NULL,
  `image` text NOT NULL,
  `textButton` varchar(255) NOT NULL,
  `linkButton` text NOT NULL,
  `posicao` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `banners`
--

INSERT INTO `banners` (`id`, `image`, `textButton`, `linkButton`, `posicao`, `status`) VALUES
(19, '18112020_1763085510banner.png', 'Acesse nosso site!', 'https://agenciacodelabs.com.br/plataforma-de-cupom-de-desconto/', 1, 1),
(21, '26062022_495383205capafilme.png', '', '', 4, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(99) NOT NULL,
  `image` text NOT NULL,
  `nome` varchar(255) NOT NULL,
  `ordem` int(99) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `image`, `nome`, `ordem`, `status`) VALUES
(2, '26062022_1746750363WhatsApp Image 2022-06-21 at 10.30.20.jpeg', 'Comer e Beber', 1, 1),
(4, '27062022_192307795509072021_1880329132innostudio.de_Logo_Fundo_Transparente.png', 'Salão de Beleza', 2, 1),
(7, '27062022_66097672209072021_1880329132innostudio.de_Logo_Fundo_Transparente.png', 'Estética Corporal', 4, 1),
(8, '27062022_31558446209072021_1880329132innostudio.de_Logo_Fundo_Transparente.png', 'Estética Facial', 12, 1),
(9, '27062022_82528913809072021_1880329132innostudio.de_Logo_Fundo_Transparente.png', 'Depilação', 3, 1),
(10, '27062022_113876963609072021_1880329132innostudio.de_Logo_Fundo_Transparente.png', 'Relax', 11, 1),
(11, '27062022_34127654309072021_1880329132innostudio.de_Logo_Fundo_Transparente.png', 'Academia', 10, 1),
(12, '27062022_147077193209072021_1880329132innostudio.de_Logo_Fundo_Transparente.png', 'Para Veículos', 8, 1),
(14, '27062022_147050081509072021_1880329132innostudio.de_Logo_Fundo_Transparente.png', 'Serviços e Produtos', 9, 1),
(16, '27062022_73953683109072021_1880329132innostudio.de_Logo_Fundo_Transparente.png', 'Ofertas Exclusivas', 0, 1),
(17, '', 'Novidades', 0, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `colunasofertas`
--

CREATE TABLE `colunasofertas` (
  `id` int(99) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `colunasofertas`
--

INSERT INTO `colunasofertas` (`id`, `nome`, `status`) VALUES
(3, 'Gastronomia', 1),
(6, 'Classificados', 0),
(7, 'Produtos & Serviços', 1),
(8, 'Novidades', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `config`
--

CREATE TABLE `config` (
  `id` int(99) NOT NULL,
  `SITE_NAME` text NOT NULL,
  `EMAIL_SITE` text NOT NULL,
  `EMAIL_ADMINISTRATIVO` varchar(255) NOT NULL,
  `SMTP` text NOT NULL,
  `SMTP_USER` text NOT NULL,
  `SMTP_PASS` text NOT NULL,
  `FACEBOOK_ID` text NOT NULL,
  `FACEBOOK_KEY` text NOT NULL,
  `PAGSEGURO_EMAIL` text NOT NULL,
  `PAGSEGURO_TOKEN` text NOT NULL,
  `GOOGLE_ADSENSE` text NOT NULL,
  `GOOGLE_ANALITYCS` text NOT NULL,
  `LOGOMARCA` text NOT NULL,
  `META_TITLE` text NOT NULL,
  `META_DESCRIPTION` text NOT NULL,
  `META_AUTOR` text NOT NULL,
  `META_KEYWORDS` text NOT NULL,
  `ICON` text NOT NULL,
  `FACEBOOK` text NOT NULL,
  `INSTAGRAM` text NOT NULL,
  `EMAIL_SENHA` text NOT NULL,
  `EMAIL_CADASTRO` text NOT NULL,
  `EMAIL_PEDIDO` text NOT NULL,
  `EMAIL_PAGO` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `config`
--

INSERT INTO `config` (`id`, `SITE_NAME`, `EMAIL_SITE`, `EMAIL_ADMINISTRATIVO`, `SMTP`, `SMTP_USER`, `SMTP_PASS`, `FACEBOOK_ID`, `FACEBOOK_KEY`, `PAGSEGURO_EMAIL`, `PAGSEGURO_TOKEN`, `GOOGLE_ADSENSE`, `GOOGLE_ANALITYCS`, `LOGOMARCA`, `META_TITLE`, `META_DESCRIPTION`, `META_AUTOR`, `META_KEYWORDS`, `ICON`, `FACEBOOK`, `INSTAGRAM`, `EMAIL_SENHA`, `EMAIL_CADASTRO`, `EMAIL_PEDIDO`, `EMAIL_PAGO`) VALUES
(1, 'Agência CodeLabs', 'atendimento@agenciacodelabs.com.br', 'atendimento@agenciacodelabs.com.br', '', '', '', '', '', 'contato@portalurbano.com.br', '33896FCFD4EE48C4A5139B4F9D2C2EA3', '', '', '', 'NewCommerce', 'Ofertas, Compras Coletivas e Cupons de Desconto', 'Agência CodeLabs', 'oferta, compra coletiva, ecommerce, e-commerce, cupons gratuitos, cupons de desconto', 'https://agenciacodelabs.com.br/wp-content/uploads/2020/11/cropped-Design-sem-nome-11-180x180.png', '', '', '<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\"> <html xmlns=\"http://www.w3.org/1999/xhtml\" xmlns=\"http://www.w3.org/1999/xhtml\">   <head>     <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\" />     <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />     <title>Configurar uma nova senha para [Product Name]</title>             </head>   <body style=\"-webkit-text-size-adjust: none; box-sizing: border-box; color: #74787E; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; height: 100%; line-height: 1.4; margin: 0; width: 100% !important;\" bgcolor=\"#F2F4F6\"><style type=\"text/css\"> body { width: 100% !important; height: 100%; margin: 0; line-height: 1.4; background-color: #F2F4F6; color: #74787E; -webkit-text-size-adjust: none; } @media only screen and (max-width: 600px) {   .email-body_inner {     width: 100% !important;   }   .email-footer {     width: 100% !important;   } } @media only screen and (max-width: 500px) {   .button {     width: 100% !important;   } } </style>     <span class=\"preheader\" style=\"box-sizing: border-box; display: none !important; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 1px; line-height: 1px; max-height: 0; max-width: 0; mso-hide: all; opacity: 0; overflow: hidden; visibility: hidden;\">Use esse link para resetar sua senha. O link e valido por 24 horas.</span>     <table class=\"email-wrapper\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; margin: 0; padding: 0; width: 100%;\" bgcolor=\"#F2F4F6\">       <tr>         <td align=\"center\" style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; word-break: break-word;\">           <table class=\"email-content\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; margin: 0; padding: 0; width: 100%;\">             <tr>               <td class=\"email-masthead\" style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; padding: 25px 0; word-break: break-word;\" align=\"center\">                 <a href=\"https://example.com\" class=\"email-masthead_name\" style=\"box-sizing: border-box; color: #bbbfc3; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 16px; font-weight: bold; text-decoration: none; text-shadow: 0 1px 0 white;\">         [Product Name]       </a>               </td>             </tr>                          <tr>               <td class=\"email-body\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" style=\"-premailer-cellpadding: 0; -premailer-cellspacing: 0; border-bottom-color: #EDEFF2; border-bottom-style: solid; border-bottom-width: 1px; border-top-color: #EDEFF2; border-top-style: solid; border-top-width: 1px; box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; margin: 0; padding: 0; width: 100%; word-break: break-word;\" bgcolor=\"#FFFFFF\">                 <table class=\"email-body_inner\" align=\"center\" width=\"570\" cellpadding=\"0\" cellspacing=\"0\" style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; margin: 0 auto; padding: 0; width: 570px;\" bgcolor=\"#FFFFFF\">                                      <tr>                     <td class=\"content-cell\" style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; padding: 35px; word-break: break-word;\">                       <h1 style=\"box-sizing: border-box; color: #2F3133; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 19px; font-weight: bold; margin-top: 0;\" align=\"left\">Olá, {{name}},</h1>                       <p style=\"box-sizing: border-box; color: #74787E; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 16px; line-height: 1.5em; margin-top: 0;\" align=\"left\"> Você solicitou recentemente para redefinir sua senha para sua conta  [Product Name]. Use o botão abaixo para reiniciá-lo. <strong style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif;\">Esta reinicialização da senha é válida somente para as próximas 24 horas.</strong></p>                                              <table class=\"body-action\" align=\"center\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; margin: 30px auto; padding: 0; text-align: center; width: 100%;\">                         <tr>                           <td align=\"center\" style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; word-break: break-word;\">                                                          <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif;\">                               <tr>                                 <td align=\"center\" style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; word-break: break-word;\">                                   <table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif;\">                                     <tr>                                       <td style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; word-break: break-word;\">                                         <a href=\"{{action_url}}\" class=\"button button--green\" target=\"_blank\" style=\"-webkit-text-size-adjust: none; background: #22BC66; border-color: #22bc66; border-radius: 3px; border-style: solid; border-width: 10px 18px; box-shadow: 0 2px 3px rgba(0, 0, 0, 0.16); box-sizing: border-box; color: #FFF; display: inline-block; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; text-decoration: none;\">Resete sua Senha</a>                                       </td>                                     </tr>                                   </table>                                 </td>                               </tr>                             </table>                           </td>                         </tr>                       </table>                       <p style=\"box-sizing: border-box; color: #74787E; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 16px; line-height: 1.5em; margin-top: 0;\" align=\"left\"> Se você não solicitou uma reinicialização da senha, ignore este e-mail ou 					  <a href=\"{{support_url}}\" style=\"box-sizing: border-box; color: #3869D4; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif;\">contate o suporte</a> se tiver duvidas.</p>                       <p style=\"box-sizing: border-box; color: #74787E; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 16px; line-height: 1.5em; margin-top: 0;\" align=\"left\">Obrigado,                         <br />A equipe do [Product Name] </p>                                              <table class=\"body-sub\" style=\"border-top-color: #EDEFF2; border-top-style: solid; border-top-width: 1px; box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; margin-top: 25px; padding-top: 25px;\">                         <tr>                           <td style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; word-break: break-word;\">                             <p class=\"sub\" style=\"box-sizing: border-box; color: #74787E; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 12px; line-height: 1.5em; margin-top: 0;\" align=\"left\">Se você estiver tendo problemas com o botão acima, copie e cole o URL abaixo em seu navegador da Web .</p>                             <p class=\"sub\" style=\"box-sizing: border-box; color: #74787E; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 12px; line-height: 1.5em; margin-top: 0;\" align=\"left\">{{action_url}}</p>                           </td>                         </tr>                       </table>                     </td>                   </tr>                 </table>               </td>             </tr>             <tr>               <td style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; word-break: break-word;\">                 <table class=\"email-footer\" align=\"center\" width=\"570\" cellpadding=\"0\" cellspacing=\"0\" style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; margin: 0 auto; padding: 0; text-align: center; width: 570px;\">                   <tr>                     <td class=\"content-cell\" align=\"center\" style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; padding: 35px; word-break: break-word;\">                       <p class=\"sub align-center\" style=\"box-sizing: border-box; color: #AEAEAE; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 12px; line-height: 1.5em; margin-top: 0;\" align=\"center\">© [Y] [Product Name]. Todos os Direitos Reservados.</p>                       <p class=\"sub align-center\" style=\"box-sizing: border-box; color: #AEAEAE; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 12px; line-height: 1.5em; margin-top: 0;\" align=\"center\">                         [Company Name, LLC]                                                </p>                     </td>                   </tr>                 </table>               </td>             </tr>           </table>         </td>       </tr>     </table>   </body> </html>', '', '<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\" xmlns=\"http://www.w3.org/1999/xhtml\">\r\n  <head>\r\n    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\" />\r\n    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />\r\n    <title>{{invite_sender_name}} com [Product Name]</title>\r\n    \r\n    \r\n  </head>\r\n  <body style=\"-webkit-text-size-adjust: none; box-sizing: border-box; color: #74787E; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; height: 100%; line-height: 1.4; margin: 0; width: 100% !important;\" bgcolor=\"#F2F4F6\"><style type=\"text/css\">\r\nbody {\r\nwidth: 100% !important; height: 100%; margin: 0; line-height: 1.4; background-color: #F2F4F6; color: #74787E; -webkit-text-size-adjust: none;\r\n}\r\n@media only screen and (max-width: 600px) {\r\n  .email-body_inner {\r\n    width: 100% !important;\r\n  }\r\n  .email-footer {\r\n    width: 100% !important;\r\n  }\r\n}\r\n@media only screen and (max-width: 500px) {\r\n  .button {\r\n    width: 100% !important;\r\n  }\r\n}\r\n</style>\r\n    <span class=\"preheader\" style=\"box-sizing: border-box; display: none !important; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 1px; line-height: 1px; max-height: 0; max-width: 0; mso-hide: all; opacity: 0; overflow: hidden; visibility: hidden;\">{{invite_sender_name}} - Você Pegou o voucher de desconto no site [Product Name] .</span>\r\n    <table class=\"email-wrapper\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; margin: 0; padding: 0; width: 100%;\" bgcolor=\"#F2F4F6\">\r\n      <tr>\r\n        <td align=\"center\" style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; word-break: break-word;\">\r\n          <table class=\"email-content\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; margin: 0; padding: 0; width: 100%;\">\r\n            <tr>\r\n              <td class=\"email-masthead\" style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; padding: 25px 0; word-break: break-word;\" align=\"center\">\r\n                <a href=\"https://example.com\" class=\"email-masthead_name\" style=\"box-sizing: border-box; color: #bbbfc3; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 16px; font-weight: bold; text-decoration: none; text-shadow: 0 1px 0 white;\">\r\n        [Product Name]\r\n      </a>\r\n              </td>\r\n            </tr>\r\n            \r\n            <tr>\r\n              <td class=\"email-body\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" style=\"-premailer-cellpadding: 0; -premailer-cellspacing: 0; border-bottom-color: #EDEFF2; border-bottom-style: solid; border-bottom-width: 1px; border-top-color: #EDEFF2; border-top-style: solid; border-top-width: 1px; box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; margin: 0; padding: 0; width: 100%; word-break: break-word;\" bgcolor=\"#FFFFFF\">\r\n                <table class=\"email-body_inner\" align=\"center\" width=\"570\" cellpadding=\"0\" cellspacing=\"0\" style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; margin: 0 auto; padding: 0; width: 570px;\" bgcolor=\"#FFFFFF\">\r\n                  \r\n                  <tr>\r\n                    <td class=\"content-cell\" style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; padding: 35px; word-break: break-word;\">\r\n                      <h1 style=\"box-sizing: border-box; color: #2F3133; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 19px; font-weight: bold; margin-top: 0;\" align=\"left\">Olá, {{name}}!</h1>\r\n                      <p style=\"box-sizing: border-box; color: #74787E; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 16px; line-height: 1.5em; margin-top: 0;\" align=\"left\">{{invite_sender_name}} com {{invite_sender_organization_name}} você pegou um novo Voucher, agora você pode apresenta-lo no estabelecimento para garantir o seu desconto.</p>\r\n                      \r\n                      <table class=\"body-action\" align=\"center\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; margin: 30px auto; padding: 0; text-align: center; width: 100%;\">\r\n                        <tr>\r\n                          <td align=\"center\" style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; word-break: break-word;\">\r\n                            \r\n                            <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif;\">\r\n                              <tr>\r\n                                <td align=\"center\" style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; word-break: break-word;\">\r\n                                  <table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif;\">\r\n                                    <tr>\r\n                                      <td style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; word-break: break-word;\">\r\n                                        <a href=\"{{action_url}}\" class=\"button button--\" target=\"_blank\" style=\"-webkit-text-size-adjust: none; background: #3869D4; border-color: #3869d4; border-radius: 3px; border-style: solid; border-width: 10px 18px; box-shadow: 0 2px 3px rgba(0, 0, 0, 0.16); box-sizing: border-box; color: #FFF; display: inline-block; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; text-decoration: none;\">Ver Voucher</a>\r\n                                      </td>\r\n                                    </tr>\r\n                                  </table>\r\n                                </td>\r\n                              </tr>\r\n                            </table>\r\n                          </td>\r\n                        </tr>\r\n                      </table>\r\n                      <p style=\"box-sizing: border-box; color: #74787E; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 16px; line-height: 1.5em; margin-top: 0;\" align=\"left\">Sinta-se à vontade para entrar em contato com nossa equipe de sucesso de clientes a qualquer momento. (Nós somos relâmpagos rápidos em responder)..</p>\r\n                      <p style=\"box-sizing: border-box; color: #74787E; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 16px; line-height: 1.5em; margin-top: 0;\" align=\"left\"> Agradecemos por usar o {{site_name}},\r\n                        <br />The [Product Name] Team</p>\r\n                      <p style=\"box-sizing: border-box; color: #74787E; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 16px; line-height: 1.5em; margin-top: 0;\" align=\"left\"><strong style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif;\">P.S.</strong> Precisa de ajuda?  <a href=\"{{help_url}}\" style=\"box-sizing: border-box; color: #3869D4; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif;\">Entre em contato conosco</a>.</p>\r\n                      \r\n                      <table class=\"body-sub\" style=\"border-top-color: #EDEFF2; border-top-style: solid; border-top-width: 1px; box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; margin-top: 25px; padding-top: 25px;\">\r\n                        <tr>\r\n                          <td style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; word-break: break-word;\">\r\n                            <p class=\"sub\" style=\"box-sizing: border-box; color: #74787E; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 12px; line-height: 1.5em; margin-top: 0;\" align=\"left\">\r\nSe você estiver tendo problemas com o botão acima, copie e cole o URL abaixo em seu navegador.</p>\r\n                            <p class=\"sub\" style=\"box-sizing: border-box; color: #74787E; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 12px; line-height: 1.5em; margin-top: 0;\" align=\"left\">{{action_url}}</p>\r\n                          </td>\r\n                        </tr>\r\n                      </table>\r\n                    </td>\r\n                  </tr>\r\n                </table>\r\n              </td>\r\n            </tr>\r\n            <tr>\r\n              <td style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; word-break: break-word;\">\r\n                <table class=\"email-footer\" align=\"center\" width=\"570\" cellpadding=\"0\" cellspacing=\"0\" style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; margin: 0 auto; padding: 0; text-align: center; width: 570px;\">\r\n                  <tr>\r\n                    <td class=\"content-cell\" align=\"center\" style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; padding: 35px; word-break: break-word;\">\r\n                      <p class=\"sub align-center\" style=\"box-sizing: border-box; color: #AEAEAE; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 12px; line-height: 1.5em; margin-top: 0;\" align=\"center\">© [Y] [Product Name]. All rights reserved.</p>\r\n                      <p class=\"sub align-center\" style=\"box-sizing: border-box; color: #AEAEAE; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 12px; line-height: 1.5em; margin-top: 0;\" align=\"center\">\r\n                        [Company Name, LLC]\r\n                       \r\n                      </p>\r\n                    </td>\r\n                  </tr>\r\n                </table>\r\n              </td>\r\n            </tr>\r\n          </table>\r\n        </td>\r\n      </tr>\r\n    </table>\r\n  </body>\r\n</html>\r\n', '<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\" xmlns=\"http://www.w3.org/1999/xhtml\">\r\n  <head>\r\n    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\" />\r\n    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />\r\n    <title>Pagamento Aprovado - [Product Name]</title>\r\n    \r\n    \r\n  </head>\r\n  <body style=\"-webkit-text-size-adjust: none; box-sizing: border-box; color: #74787E; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; height: 100%; line-height: 1.4; margin: 0; width: 100% !important;\" bgcolor=\"#F2F4F6\"><style type=\"text/css\">\r\nbody {\r\nwidth: 100% !important; height: 100%; margin: 0; line-height: 1.4; background-color: #F2F4F6; color: #74787E; -webkit-text-size-adjust: none;\r\n}\r\n@media only screen and (max-width: 600px) {\r\n  .email-body_inner {\r\n    width: 100% !important;\r\n  }\r\n  .email-footer {\r\n    width: 100% !important;\r\n  }\r\n}\r\n@media only screen and (max-width: 500px) {\r\n  .button {\r\n    width: 100% !important;\r\n  }\r\n}\r\n</style>\r\n    <span class=\"preheader\" style=\"box-sizing: border-box; display: none !important; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 1px; line-height: 1px; max-height: 0; max-width: 0; mso-hide: all; opacity: 0; overflow: hidden; visibility: hidden;\">This is an invoice for your purchase on {{ purchase_date }}. Please submit payment by {{ due_date }}</span>\r\n    <table class=\"email-wrapper\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; margin: 0; padding: 0; width: 100%;\" bgcolor=\"#F2F4F6\">\r\n      <tr>\r\n        <td align=\"center\" style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; word-break: break-word;\">\r\n          <table class=\"email-content\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; margin: 0; padding: 0; width: 100%;\">\r\n            <tr>\r\n              <td class=\"email-masthead\" style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; padding: 25px 0; word-break: break-word;\" align=\"center\">\r\n                <a href=\"https://example.com\" class=\"email-masthead_name\" style=\"box-sizing: border-box; color: #bbbfc3; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 16px; font-weight: bold; text-decoration: none; text-shadow: 0 1px 0 white;\">\r\n        [Product Name]\r\n      </a>\r\n              </td>\r\n            </tr>\r\n            \r\n            <tr>\r\n              <td class=\"email-body\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" style=\"-premailer-cellpadding: 0; -premailer-cellspacing: 0; border-bottom-color: #EDEFF2; border-bottom-style: solid; border-bottom-width: 1px; border-top-color: #EDEFF2; border-top-style: solid; border-top-width: 1px; box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; margin: 0; padding: 0; width: 100%; word-break: break-word;\" bgcolor=\"#FFFFFF\">\r\n                <table class=\"email-body_inner\" align=\"center\" width=\"570\" cellpadding=\"0\" cellspacing=\"0\" style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; margin: 0 auto; padding: 0; width: 570px;\" bgcolor=\"#FFFFFF\">\r\n                  \r\n                  <tr>\r\n                    <td class=\"content-cell\" style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; padding: 35px; word-break: break-word;\">\r\n                      <h1 style=\"box-sizing: border-box; color: #2F3133; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 19px; font-weight: bold; margin-top: 0;\" align=\"left\">Olá, {{name}},</h1>\r\n                      <p style=\"box-sizing: border-box; color: #74787E; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 16px; line-height: 1.5em; margin-top: 0;\" align=\"left\">Obrigado por comprar no [Product Name]. Seu pagamento foi aprovado e seu produto está disponivel.</p>\r\n                      <table class=\"attributes\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif;\">\r\n                        <tr>\r\n                          <td class=\"attributes_content\" style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; word-break: break-word;\">\r\n                            <table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif;\">\r\n                              <tr>\r\n                                <td class=\"attributes_item\" style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; word-break: break-word;\"><strong style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif;\">Valor:</strong> {{total}}</td>\r\n                              </tr>\r\n                              <tr>\r\n                                <td class=\"attributes_item\" style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; word-break: break-word;\"><strong style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif;\">Data da Aprovação:</strong> {{due_date}}</td>\r\n                              </tr>\r\n                            </table>\r\n                          </td>\r\n                        </tr>\r\n                      </table>\r\n                      \r\n                      <table class=\"body-action\" align=\"center\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; margin: 30px auto; padding: 0; text-align: center; width: 100%;\">\r\n                        <tr>\r\n                          <td align=\"center\" style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; word-break: break-word;\">\r\n                            \r\n                            <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif;\">\r\n                              <tr>\r\n                                <td align=\"center\" style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; word-break: break-word;\">\r\n                                  <table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif;\">\r\n                                    <tr>\r\n                                      <td style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; word-break: break-word;\">\r\n                                        <a href=\"{{action_url}}\" class=\"button button--green\" target=\"_blank\" style=\"-webkit-text-size-adjust: none; background: #22BC66; border-color: #22bc66; border-radius: 3px; border-style: solid; border-width: 10px 18px; box-shadow: 0 2px 3px rgba(0, 0, 0, 0.16); box-sizing: border-box; color: #FFF; display: inline-block; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; text-decoration: none;\">Pegar Comprovante</a>\r\n                                      </td>\r\n                                    </tr>\r\n                                  </table>\r\n                                </td>\r\n                              </tr>\r\n                            </table>\r\n                          </td>\r\n                        </tr>\r\n                      </table>\r\n                      <table class=\"purchase\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; margin: 0; padding: 35px 0; width: 100%;\">\r\n                        <tr>\r\n                          <td style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; word-break: break-word;\">\r\n                            <h3 style=\"box-sizing: border-box; color: #2F3133; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 14px; font-weight: bold; margin-top: 0;\" align=\"left\">{{invoice_id}}</h3></td>\r\n                          <td style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; word-break: break-word;\">\r\n                            <h3 class=\"align-right\" style=\"box-sizing: border-box; color: #2F3133; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 14px; font-weight: bold; margin-top: 0;\" align=\"right\">{{date}}</h3></td>\r\n                        </tr>\r\n                        <tr>\r\n                          <td colspan=\"2\" style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; word-break: break-word;\">\r\n                            <table class=\"purchase_content\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; margin: 0; padding: 25px 0 0; width: 100%;\">\r\n                              <tr>\r\n                                <th class=\"purchase_heading\" style=\"border-bottom-color: #EDEFF2; border-bottom-style: solid; border-bottom-width: 1px; box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; padding-bottom: 8px;\">\r\n                                  <p style=\"box-sizing: border-box; color: #9BA2AB; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 12px; line-height: 1.5em; margin: 0;\" align=\"left\">Description</p>\r\n                                </th>\r\n                                <th class=\"purchase_heading\" style=\"border-bottom-color: #EDEFF2; border-bottom-style: solid; border-bottom-width: 1px; box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; padding-bottom: 8px;\">\r\n                                  <p class=\"align-right\" style=\"box-sizing: border-box; color: #9BA2AB; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 12px; line-height: 1.5em; margin: 0;\" align=\"right\">Amount</p>\r\n                                </th>\r\n                              </tr>\r\n                              {{#each invoice_details}}\r\n                              <tr>\r\n                                <td width=\"80%\" class=\"purchase_item\" style=\"box-sizing: border-box; color: #74787E; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 15px; line-height: 18px; padding: 10px 0; word-break: break-word;\">{{description}}</td>\r\n                                <td class=\"align-right\" width=\"20%\" style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; word-break: break-word;\" align=\"right\">{{amount}}</td>\r\n                              </tr>\r\n                              {{/each}}\r\n                              <tr>\r\n                                <td width=\"80%\" class=\"purchase_footer\" valign=\"middle\" style=\"border-top-color: #EDEFF2; border-top-style: solid; border-top-width: 1px; box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; padding-top: 15px; word-break: break-word;\">\r\n                                  <p class=\"purchase_total purchase_total--label\" style=\"box-sizing: border-box; color: #2F3133; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 16px; font-weight: bold; line-height: 1.5em; margin: 0; padding: 0 15px 0 0;\" align=\"right\">Total</p>\r\n                                </td>\r\n                                <td width=\"20%\" class=\"purchase_footer\" valign=\"middle\" style=\"border-top-color: #EDEFF2; border-top-style: solid; border-top-width: 1px; box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; padding-top: 15px; word-break: break-word;\">\r\n                                  <p class=\"purchase_total\" style=\"box-sizing: border-box; color: #2F3133; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 16px; font-weight: bold; line-height: 1.5em; margin: 0;\" align=\"right\">{{total}}</p>\r\n                                </td>\r\n                              </tr>\r\n                            </table>\r\n                          </td>\r\n                        </tr>\r\n                      </table>\r\n                      <p style=\"box-sizing: border-box; color: #74787E; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 16px; line-height: 1.5em; margin-top: 0;\" align=\"left\">\r\nSe você tiver dúvidas sobre essa fatura, simplesmente responda a este e-mail ou contacte a nossa equipe de suporte para obter ajuda.</p>\r\n                      <p style=\"box-sizing: border-box; color: #74787E; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 16px; line-height: 1.5em; margin-top: 0;\" align=\"left\">Obrigado,\r\n                        <br />[Product Name] Team</p>\r\n                      \r\n                      <table class=\"body-sub\" style=\"border-top-color: #EDEFF2; border-top-style: solid; border-top-width: 1px; box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; margin-top: 25px; padding-top: 25px;\">\r\n                        <tr>\r\n                          <td style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; word-break: break-word;\">\r\n                            <p class=\"sub\" style=\"box-sizing: border-box; color: #74787E; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 12px; line-height: 1.5em; margin-top: 0;\" align=\"left\">Se você estiver tendo problemas com o botão acima, copie e cole o URL abaixo em seu navegador.</p>\r\n                            <p class=\"sub\" style=\"box-sizing: border-box; color: #74787E; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 12px; line-height: 1.5em; margin-top: 0;\" align=\"left\">{{action_url}}</p>\r\n                          </td>\r\n                        </tr>\r\n                      </table>\r\n                    </td>\r\n                  </tr>\r\n                </table>\r\n              </td>\r\n            </tr>\r\n            <tr>\r\n              <td style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; word-break: break-word;\">\r\n                <table class=\"email-footer\" align=\"center\" width=\"570\" cellpadding=\"0\" cellspacing=\"0\" style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; margin: 0 auto; padding: 0; text-align: center; width: 570px;\">\r\n                  <tr>\r\n                    <td class=\"content-cell\" align=\"center\" style=\"box-sizing: border-box; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; padding: 35px; word-break: break-word;\">\r\n                      <p class=\"sub align-center\" style=\"box-sizing: border-box; color: #AEAEAE; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 12px; line-height: 1.5em; margin-top: 0;\" align=\"center\">© [Y] [Product Name]. Todos os direitos reservados.</p>\r\n                      <p class=\"sub align-center\" style=\"box-sizing: border-box; color: #AEAEAE; font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif; font-size: 12px; line-height: 1.5em; margin-top: 0;\" align=\"center\">\r\n                        [Company Name, LLC]\r\n                \r\n                      </p>\r\n                    </td>\r\n                  </tr>\r\n                </table>\r\n              </td>\r\n            </tr>\r\n          </table>\r\n        </td>\r\n      </tr>\r\n    </table>\r\n  </body>\r\n</html>\r\n');

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresas`
--

CREATE TABLE `empresas` (
  `id` int(99) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `endereco` text NOT NULL,
  `cidade` text NOT NULL,
  `estado` text NOT NULL,
  `telefone` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `cnpj` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `descricao` text NOT NULL,
  `localidade` varchar(255) NOT NULL,
  `selo` varchar(255) NOT NULL,
  `pode_adicionar` int(11) NOT NULL,
  `pode_editar` int(11) NOT NULL,
  `maximo_ofertas` varchar(99) NOT NULL,
  `email_pagseguro` text NOT NULL,
  `token_pagseguro` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `empresas`
--

INSERT INTO `empresas` (`id`, `nome`, `endereco`, `cidade`, `estado`, `telefone`, `email`, `pass`, `cnpj`, `image`, `descricao`, `localidade`, `selo`, `pode_adicionar`, `pode_editar`, `maximo_ofertas`, `email_pagseguro`, `token_pagseguro`, `status`) VALUES
(32, 'Agência CodeLabs', '', 'Belo Horizonte', 'Minas Gerais', '', 'atendimento@agenciacodelabs.com.br', '0192023a7bbd73250516f069df18b500', '', '18112020_1292167064banner.png', '', '1', '0', 1, 0, '1000', '', '', 1),
(33, 'Agência CodeLabs SP', '', 'São Paulo', 'São Paulo', '', 'atendimentosp@agenciacodelabs.com.br', '3f7caa3d471688b704b73e9a77b1107f', '', '18112020_1543936407banner.png', '<p><br></p>', '4', '0', 1, 0, '1000', '', '', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `localidade`
--

CREATE TABLE `localidade` (
  `id` int(99) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `ordem` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `localidade`
--

INSERT INTO `localidade` (`id`, `nome`, `estado`, `ordem`, `status`) VALUES
(1, 'Belo Horizonte', 'Minas Gerais', 0, 1),
(4, 'São Paulo', 'São Paulo', 0, 1),
(5, 'Rio de Janeiro', 'Rio de Janeiro', 0, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `menu_admin`
--

CREATE TABLE `menu_admin` (
  `id` int(99) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `tabela` varchar(255) NOT NULL,
  `rows` text NOT NULL,
  `cols` text NOT NULL,
  `categoria` int(99) NOT NULL,
  `ordem` int(11) NOT NULL,
  `where` text NOT NULL,
  `tipo` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `menu_admin`
--

INSERT INTO `menu_admin` (`id`, `nome`, `tabela`, `rows`, `cols`, `categoria`, `ordem`, `where`, `tipo`, `icon`, `status`) VALUES
(1, 'Administradores', 'administracao', 'id,nome,email,status', 'id,nome,email,user,pass,status', 1, 1, '', 1, 'fa fa-user', 1),
(2, 'Usuarios', 'usuarios', 'id,image,nome,email,status', 'id,nome,email,pass,image,cpf,cep,cidade,estado,endereco,status', 1, 3, '', 1, 'fa fa-users', 1),
(3, 'Empresas', 'empresas', 'id,image,nome,email,cnpj,localidade,status', 'id,nome,email,pass,cnpj,image,localidade,estado,cidade,endereco,telefone,descricao,pode_adicionar,pode_editar,maximo_ofertas,selo,email_pagseguro,token_pagseguro,status', 1, 2, '', 1, 'fa fa-building', 1),
(4, 'Categorias', 'categorias', 'id,image,nome,status', 'id,image,nome,status', 2, 3, '', 1, 'fa fa-bars', 1),
(5, 'Produtos', 'produtos', 'id,image,nome,categorias,status', 'id,nome,CONTAINER,breve_descricao,descricao,regras_de_uso,empresas,cronometro,opcao,quantidade,valor,desconto,opcao2,valor2,desconto2,valido,tipoProd,categorias,image,image2,image3,image4,image5,image6,status', 2, 1, '', 1, 'fa fa-shopping-cart ', 1),
(6, 'Localidade', 'localidade', 'id,nome,estado,status', 'id,nome,estado,status', 3, 2, '', 1, 'fa fa-map-marker', 1),
(7, 'Banners', 'banners', 'id,image,status', 'id,image,textButton,linkButton,posicao,status', 3, 1, '', 1, 'fa fa-image', 1),
(8, 'Pedidos Compras', 'pedidos', 'id,produtos,usuarios,valor_pago,code_gerado,pago,utilizado,status', 'id,produtos,usuarios,valor_pago,data_pedido,pago,utilizado,status_do_pedido,code_gerado,status', 2, 3, 'tipo_pedido,1', 1, 'fa fa-shopping-cart ', 1),
(9, 'Pedidos Vouchers', 'pedidos', 'id,produtos,usuarios,code_gerado,valor_pago,utilizado,status', 'id,produtos,usuarios,valor_pago,data_pedido,utilizado,status_do_pedido,code_gerado,status', 2, 3, 'tipo_pedido,0', 1, 'fa fa-shopping-cart ', 1),
(10, 'Pagseguro', 'config', '', 'PAGSEGURO_EMAIL,PAGSEGURO_TOKEN', 4, 1, 'id,1', 2, 'fa fa-credit-card', 1),
(11, 'Google Adsense', 'config', '', 'GOOGLE_ADSENSE', 4, 2, 'id,1', 2, 'fa fa-google', 1),
(12, 'Google Analytics', 'config', '', 'GOOGLE_ANALITYCS', 4, 2, 'id,1', 2, 'fa fa-google', 1),
(13, 'Configurações Globais', 'config', '', 'SITE_NAME,LOGOMARCA,EMAIL_SITE,EMAIL_ADMINISTRATIVO,FACEBOOK,INSTAGRAM,SMTP,SMTP_USER,SMTP_PASS,FACEBOOK_ID,FACEBOOK_KEY', 4, 2, 'id,1', 2, 'fa fa-globe', 1),
(14, 'Meta Tags', 'config', '', 'META_TITLE,META_DESCRIPTION,META_AUTOR,META_KEYWORDS,ICON', 4, 1, 'id,1', 2, 'fa fa-globe', 1),
(15, 'Validar', 'pedidos', '', 'id,produto,usuarios,status', 2, 1, '', 3, 'fa fa-barcode', 1),
(16, 'Paginas', 'paginas', 'id,url,status', 'id,url,conteudo,meta_title,meta_description,meta_autor,meta_keywords,status', 3, 1, '', 1, 'fa fa-file', 1),
(17, 'Recuperar Senha', 'config', '', 'EMAIL_SENHA', 4, 1, 'id,1', 2, 'fa fa-envelope', 1),
(18, 'Cadastro', 'config', '', 'EMAIL_CADASTRO', 4, 1, 'id,1', 2, 'fa fa-envelope', 1),
(19, 'Novo Pedido ', 'config', '', 'EMAIL_PEDIDO', 4, 1, 'id,1', 2, 'fa fa-envelope', 1),
(20, 'Pedido Pago', 'config', '', 'EMAIL_PAGO', 4, 1, 'id,1', 2, 'fa fa-envelope', 1),
(21, 'Colunas Ofertas', 'colunasofertas', 'id,nome,status', 'id,nome,status', 3, 1, '', 1, 'fa fa-bars', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `menu_admin_categorias`
--

CREATE TABLE `menu_admin_categorias` (
  `id` int(99) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `ordem` int(99) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `menu_admin_categorias`
--

INSERT INTO `menu_admin_categorias` (`id`, `nome`, `ordem`, `status`) VALUES
(1, 'Pessoas', 1, 1),
(2, 'Produtos', 2, 1),
(3, 'Gerenciar', 3, 1),
(4, 'Configuracoes', 4, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `paginas`
--

CREATE TABLE `paginas` (
  `id` int(99) NOT NULL,
  `url` varchar(255) NOT NULL,
  `conteudo` text NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_description` varchar(955) NOT NULL,
  `meta_autor` varchar(255) NOT NULL,
  `meta_keywords` varchar(455) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `paginas`
--

INSERT INTO `paginas` (`id`, `url`, `conteudo`, `meta_title`, `meta_description`, `meta_autor`, `meta_keywords`, `status`) VALUES
(1, 'sobre-nos', '<h5><span style=\"color: rgb(114, 111, 111); font-family: Poppins, sans-serif; font-size: 16px; font-weight: 400;\">O Sistema de Cupom Descontos é um site de anúncios voltado para anúncio de empresas e serviços de descontos.</span></h5><h5><span style=\"color: rgb(114, 111, 111); font-family: Poppins, sans-serif; font-size: 16px; font-weight: 400;\"><br></span></h5><h5><span style=\"color: rgb(114, 111, 111); font-family: Poppins, sans-serif; font-size: 16px; font-weight: 400;\"> Altamente lucrativo e de fácil administração é um sistema totalmente desenvolvido pela Agência CodeLabs. Se você ou sua empresa presta serviços de qualidade e está precisando divulgar empresas e descontos, este é o sistema.</span><br></h5><p>\r\n</p>', 'Demonstrativo Sistema de Cupom de Desconto Agência CodeLabs - Sobre Nos', 'Demonstrativo Sistema de Cupom de Desconto Agência CodeLabs - Sobre Nos', 'Agência CodeLabs', 'agenciacodelabs,Agência CodeLabs, CodeLabs,demonstrativo, Sobre, Nos', 1),
(2, 'como-funciona', '<h5>COMO FUNCIONA</h5><h5>Todos os dias são lançadas novas ofertas incríveis com várias categorias para você aproveitar.</h5><ul><li>Você escolhe a cidade de sua preferência</li><li>Você faz o seu login no canto superior esquerdo. Se for a primeira vez, basta se cadastrar. É rápido e gratuito!</li><li>Se você gostar da oferta, clique em \"Detalhes\" para se informar melhor sobre a oferta.</li><li>Após verificar as informações da oferta que gostou, tendo conhecimento dos detalhes e das regras de uso você clique em uma das opções: \"COMPRAR ON LINE\", \"PEGAR DESCONTO\" ou \"ESTOU INTERESSADO\".</li><li>\"COMPRAR ON LINE\" - Você faz o pagamento através do PagSeguro da Uol. Já garante a sua oferta e pode usar de acordo com as regras da oferta.</li><li>\"PEGAR DESCONTO\" - Você salva o seu cupom em sua conta e pode usar de acordo com as regras da oferta.</li><li>\"ESTOU INTERESSADO\" - Você envia para empresa responsável pela oferta o seu interesse na oferta e aguarda o contato da empresa.</li></ul>', 'Como Funciona o PortalUrbano', 'como funciona, funcionamento do portalurbano', '', '', 1),
(3, 'politica-privacidade', '<p></p><h5>Política de Privacidade</h5><p>Nosso compromisso é respeitar sua privacidade e garantir o sigilo de todas as informações que você nos fornece. Todos os dados cadastradosem nosso site são utilizados apenas para melhorar sua experiência de compra e mantê-lo atualizado sobre nossas promoções e vantagens oferecidas\r\npor empresas parceiras do PortalUrbano.<br></p><p></p><p><b>Uso e Segurança das informações</b></p><p>Para seu cadastro, solicitamos informações como nome, endereço, e-mail e telefones para contato, para facilitar suas compras no site.\r\nO seu e-mail é utilizado para divulgar informações de suas compras e, quando solicitado por você, para comunicar promoções de produtos e serviços\r\ndo PortalUrbano e suas parceiras.</p><p>O PortalUrbano somente compartilha as informações pessoais com empresas afiliadas do PortalUrbano e exclusivamente com o objetivo de fornecer a\r\nvocê as melhores ofertas de produtos e serviços, ou em circunstâncias específicas como ordem judicial ou advindas de lei.</p><p><b>Envio de e-mails</b></p><p>O PortalUrbano nunca envia e-mails solicitando confirmação de dados/cadastro ou com anexos executáveis (extensão exe, com, scr, bat) e links para\r\ndownload.\r\nOs links de nossos e-mails levam diretamente para o www.portalurbano.com.br ou para empresas parceiras. Nunca forneça a senha de seu cadastro a terceiros\r\ne, no caso de uso não autorizado, acesse imediatamente a área “Meus Dados” em “Minha Conta” no site e altere sua senha.</p><p>Caso deseje parar de receber nossos e-mails, basta clicar no link “remova aqui” que se localiza no rodapé de todos os e-mails enviados.</p><p>Em caso de dúvidas ou sugestões, por favor, entre em contato conosco pelo e-mail faleconosco@portalurbano.com.br ou pelo telefone/whatsapp – (37) 99974.8145</p><p><b>Alterações nesta Política de Privacidade</b></p><p>Esta Política de Privacidade pode ser alterada periodicamente. Esta Política de Privacidade não reduzirá os seus direitos sem o seu consentimento\r\nexplícito. Publicaremos todas as alterações da Política de Privacidade nesta página e, se as alterações forem significativas, colocaremos um aviso\r\ncom mais destaque, incluindo, para alguns serviços, notificação por e-mail das alterações da Política de Privacidade. Também manteremos as versões\r\nanteriores desta Política de Privacidade arquivadas para você visualizá-las.</p>', '', '', '', '', 1),
(4, 'termos-de-uso', '<h5>TERMOS DE USO</h5><p>Este Termo de Uso apresenta as \"Condições Gerais\" aplicáveis ao uso dos serviços oferecidos pelo  \"PortalUrbano\", incluindo os serviços para a aquisição com desconto de bens, produtos e serviços dentro do site www.portalurbano.com.br.\r\n \r\nQualquer pessoa, doravante nominada \"Usuário\", que pretenda utilizar os serviços do PortalUrbano e verá aceitar este Termo de Uso, e todas as demais políticas e princípios que o regem. A ACEITAÇÃO DO TERMO DE USO É ABSOLUTAMENTE INDISPENSÁVEL À UTILIZAÇÃO DO WEBSITE E SEUS SERVIÇOS.\r\n \r\nO Usuário deverá ler, certificar-see de haver entendido e aceitar todas as condições estabelecidas no Termo de Uso, assim como nos demais documentos incorporados aos mesmos por referência, antes de seu cadastro como Usuário do PortalUrbano.\r\n</p><p><b> \r\n1. PARTES</b></p><p>1.1 Este termo, tem de um lado, a empresa  denominada doravante de PortalUrbano, e, do outro, o usuário, denominado doravante apenas de USUÁRIO, que acessou o endereço eletrônico www.portalurbano.com.br, denominado apenas de site.</p><p>1.2 Entende-se por USUÁRIO a pessoa física ou jurídica que acessou o site e efetuou o seu respectivo cadastro no site Baita Oferta, por livre e espontânea vontade.</p><p><b>2. OBJETO</b></p><p>2.1 O objeto deste termo é a disponibilização temporal de ofertas de produtos e/ou serviços de empresas PARCEIRAS através do site de propriedade do PortalUrbano aos USUÁRIOS devidamente cadastrados no sistema, dentro de um determinado prazo de validade e sujeitas ao cumprimento de condições específicas de aquisição, através do regulamento que é disponibilizado pelo site.</p><p>2.2 Entende-se por empresa PARCEIRA as pessoas jurídicas que, mediante instrumento próprio, estabelecem um vínculo de intermediação de negócios que têm acordos firmados por contratos com o site.</p><p>2.3 A possibilidade de aquisição com desconto dos produtos e/ou serviços das empresas parceiras (\"Parceiro\") ocorre a partir da pré-negociação entre PortalUrbano e o Parceiro de um número máximo de cupons disponíveis de determinado produto e/ou serviço que devem acontecer através do website.</p><p>2.4 O cadastro da pessoa jurídica deverá ser feito por seu representante legal ou por pessoa que possua expressos poderes para representá-la.</p><p>2.5 A disponibilização das ofertas se dará através da locação pela PARCEIRA de sistema de propriedade do PortalUrbano</p><p>2.6 Uma vez adquirido e devidamente pago, o Usuário receberá os produtos e/ou serviços adquiridos diretamente do Parceiro através da apresentação de um cupom eletrônico distribuído pelo PortalUrbano aos compradores.</p><p>2.7 A publicação, aquisição e entrega da Oferta acontecerá conforme as seguintes etapas:\r\na) Publicação da Oferta: A Oferta será publicada no website do Baita Oferta e assim permanecerá durante o período indicado no próprio website (\"Período de Publicação\") para conhecimento pelos Usuários e do número disponível de cupons disponíveis para aquisição.\r\nb) Aquisição da Oferta: O Usuário interessado em adquirir a Oferta, exclusivamente durante o Período de Publicação, deverá manifestar-se eletronicamente através do website, efetuando o pagamento conforme instruções indicadas no próprio website. O website informará durante todo Período de Publicação o número de aquisições já efetuadas.\r\nc) Validação da Oferta: A Oferta publicada no website do Baita Oferta será validada automaticamente APENAS quando o pagamento for confirmado pela gestora e administradora dos pagamentos.\r\nd) Entrega dos Produtos e/ou Serviços Ofertados: Após a Validação da Oferta, o Baita Oferta irá confirmar a Aquisição da Oferta aos Usuários que realizaram a compra e distribuirá eletronicamente um cupom numerado para identificação, que reproduzirá todas as condições de uso e/ou entrega inicialmente publicadas no website, para que os produtos e/ou serviços sejam recebidos do Parceiro.</p><p><b>3. CAPACIDADE PARA CADASTRAR-SE NO WEBSITE</b></p><p>3.1 Os serviços do PortalUrbano estão disponíveis apenas para as pessoas que tenham capacidade legal para contratá-los. Não podem utilizá-los, assim, pessoas que não gozem dessa capacidade, inclusive menores de idade, ou pessoas que tenham sido inabilitadas do PortalUrbano temporária ou definitivamente.</p><p>3.2 O USUÁRIO declara para todos os fins que apresenta plena capacidade para a prática dos atos necessários à negociação objeto do presente Termo.</p><p>3.3 Caso o USUÁRIO não possua capacidade para praticar os atos objetos do presente Termo, seus pais ou representantes legais serão responsáveis por todas as consequências advindas dos mesmos.</p><p>3.4 Cada USUÁRIO terá direito a apenas 1 (um) cadastro.</p><p>3.5 Havendo duplicidade de cadastros, todos serão cancelados.</p><p>3.6 Pessoas Jurídicas poderão cadastrar-se mediante seu representante legal.</p><p><b>4. CADASTRO DO USUÁRIO</b></p><p>4.1 O acesso às ofertas se dará mediante cadastramento e criação pelo USUÁRIO de um login e de uma senha no site, bem como do aceite dado ao presente Termo de Uso.</p><p>4.2 Apenas será confirmado o cadastramento do interessado que preencher todos os campos do cadastro. O futuro Usuário deverá completá-lo com informações exatas, precisas e verdadeiras, e assume o compromisso de atualizar os dados pessoais sempre que neles ocorrer alguma alteração.</p><p>4.3 O PortalUrbano não se responsabiliza pela correção dos dados pessoais inseridos por seus Usuários. Os Usuários garantem e respondem, em qualquer caso, pela veracidade, exatidão e autenticidade dos dados pessoais cadastrados.</p><p>4.4 O PortalUrbano se reserva o direito de utilizar todos os meios válidos e possíveis para identificar seus Usuários, bem como de solicitar dados adicionais e documentos que estime serem pertinentes a fim de conferir os dados pessoais informados.</p><p>4.5 Havendo qualquer falha no cadastro do USUÁRIO, comprometendo a sua correta identificação, o PortalUrbano terá reservado o direito de cancelar o cadastro feito sem prévia autorização, bem como haver do responsável pelo cadastro o ressarcimento de todos os prejuízos sofridos.</p><p>4.6 No caso da existência de dúvidas a cerca da autenticidade de alguma informação fornecida pelo USUÁRIO, o PortalUrbano poderá solicitar o envio de documentos para atestarem a sua veracidade no prazo de 10 (dez) dias, situação em que haverá a suspensão do cadastro.</p><p>4.7 Havendo recusa do USUÁRIO de enviar a documentação comprobatória, ou, ainda, no caso de envio fora do prazo, o PortalUrbano terá garantido o direito de cancelar o seu cadastro, na forma da cláusula 4.5.</p><p>4.8 Havendo a aplicação de qualquer das sanções acima referidas, automaticamente serão canceladas as Aquisições de Ofertas feitas pelo Usuário junto ao website, não assistindo ao Usuário, por essa razão, qualquer sorte de indenização ou ressarcimento.</p><p>4.9 O login e a senha do USUÁRIO são de uso pessoal e intransferível, compromete-se a não informar a terceiros esses dados, responsabilizando-se integralmente pelo uso que deles seja feito, não podendo ser cedidos, vendidos, alugados ou transferidos sob qualquer forma.</p><p>4.10 Não se permitirá a manutenção de mais de um cadastro por uma mesma pessoa, ou ainda a criação de novos cadastros por pessoas cujos cadastros originais tenham sido cancelados por infrações às políticas do PortalUrbano</p><p>4.11 A utilização do sistema está inteiramente vinculada às disposições deste Termo e da legislação vigente.</p><p>4.12 O USUÁRIO declara que as informações fornecidas sobre si para seu cadastro são verdadeiras e atuais, assumindo todas as responsabilidades \r\nacercadas mesmas.</p><p>4.13 Não serão aceitos nos cadastros a utilização de qualquer expressão que atinja direito alheio, bem como seja contrária ao ordenamento jurídico, a moral e aos bons costumes.</p><p>4.14 O USUÁRIO declara ter lido e aceito sem qualquer reserva todas as disposições constantes no presente Termo.</p><p>4.15 O USUÁRIO, sempre que houver perda, roubo ou furto de login e/ou senha, compromete-se a comunicar imediatamente ao PortalUrbano. O usuário será o único responsável pelas operações efetuadas em sua conta, uma vez que o acesso à mesma só será possível mediante a aposição da senha,cujo conhecimento é exclusivo do Usuário.</p><p>4.16 O USUÁRIO que descumprir o estipulado na cláusula 4.12 será responsabilizado civil e criminalmente.</p><p><b>5. OBRIGAÇÕES DOS USUÁRIOS</b></p><p>5.1 Os Usuários interessados nas Ofertas anunciadas pelo PortalUrbano devem realizar as aquisições e pagamento durante o Período de Publicação. \r\nA Publicação da Oferta encerra-se quando expirado o prazo supra-definido pelo PortalUrbano ou quando esgotar a quantidade do produto e/ou serviço \r\noferecido pelo Parceiro.</p><p>5.2 O Usuário adquirente, após manifestar-se pela Aquisição da Oferta, obriga-se a adquirir a Oferta no caso de sua Validação, bem como a seu pagamento. A Oferta de Compra é irrevogável, nos termos dos artigos 427 e 429 do Código Civil, ressalvadas circunstâncias excepcionais.</p><p>5.3 Ao adquirir a Oferta através do website o Usuário comprador declara-se ciente sobre as condições de recebimento e/ou uso do produto e/ou serviço publicadas no website e reproduzidas no cupom eletrônico.</p><p>5.4 O PortalUrbano não se responsabiliza pelas obrigações tributárias que recaiam sobre as atividades dos Usuários do site, bem como sobre a\r\nde seus Parceiros. Assim como estabelece a legislação pertinente em vigor, o consumidor deverá exigir nota fiscal do Parceiro em suas transações.</p><p><b>6. OFERTAS</b></p><p>6.1 As ofertas serão disponibilizadas através do site, em nome da Empresa PARCEIRA, acompanhadas de todas as informações necessárias para as \r\naquisições.</p><p>6.2 As ofertas devem ser adquiridas dentro do prazo de validade estipulado no anúncio.</p><p>6.3 As ofertas só poderão ser adquiridas enquanto houver cupons disponíveis.</p><p>6.4 O PortalUrbano através do site informará continuamente o número de aquisições já efetivadas, para fins de acompanhamento dos USUÁRIOS.</p><p>6.5 As ofertas são de inteira responsabilidade das empresas PARCEIRAS, tendo o PortalUrbano apenas o papel de intermediação de negócios através \r\nda locação de seu sistema.</p><p>6.6 As ofertas são submetidas a um tempo mínimo de expiração e não poderão ser compradas após esse prazo.</p><p>6.7 As ofertas estarão submetidas a um número máximo de aquisições.</p><p>6.8 O USUÁRIO interessado em adquirir uma oferta deverá, dentro do prazo de validade estipulado para a aquisição, se manifestar eletronicamente através do site em campo próprio, onde conterá todas as instruções necessárias para a efetivação da compra.</p><p>6.9 A guarda do cupom será de inteira responsabilidade do USUÁRIO.</p><p>6.10 Efetivada a oferta, o USUÁRIO receberá um cupom de validação no seu e-mail cadastrado, que conterá todas as informações necessárias para a \r\nentrega do bem e/ou serviço. O cupom também será disponibilizado no site.</p><p>6.11 O cupom enviado só será disponibilizado em sua conta do PortalUrbano na opção Cupons, dentro do prazo de validade constante no anúncio.</p><p>6.12 A não utilização do cupom no prazo estipulado não garante a restituição ou troca dos valores pagos em formas de crédito ou de compensação em \r\noutras ofertas do site.</p><p>6.13 O PortalUrbano reserva o direito de reembolsar o USUÁRIO comprador de Oferta, cuja entrega venha a ser comprometida em razão de caso fortuito ou força maior, desde que a solicitação seja feita em até 7 dias da data da confirmação do pagamento. Tais casos deverão ser comunicados via e-mail para faleconosco@portalurbano.com.br, onde serão apresentadas duas opções para reembolso: créditos para uso no website ou estorno no valor do pagamento efetuado para Aquisição da Oferta, de acordo com as regras ditadas pelo sistema de processamento de pagamento em vigor. Caso não haja manifestação sobre a forma de reembolso no prazo de 3 dias da solicitação por e-mail, entender-se-á que o Usuário optou tacitamente pela conversão em créditos para uso no site.</p><p><b>7. PAGAMENTO</b>\r\n</p><p>7.1 Os pagamentos dos valores referentes às ofertas deverão ser feitos através do sistema de pagamentos utilizado pelo site.</p><p>7.2 O PortalUrbano não tem nenhuma responsabilidade sob a negociação, não podendo intervir na relação entre o USUÁRIO e a empresa gestora e \r\nadministradora de pagamentos, nem sendo responsável pela prestação dos serviços oferecidos por esta.</p><p><b>8. MODIFICAÇÕES DO TERMO DE USO</b></p><p>8.1 O PortalUrbano poderá alterar, a qualquer tempo, este Termo de Uso, visando seu aprimoramento e melhoria dos serviços prestados, sem que \r\npara isso necessite prévia comunicação.</p><p>8.2 O novo Termo de Uso entrará em vigor a partir de sua publicação no website. No prazo de 24 (vinte e quatro) horas contadas a partir da \r\npublicação das modificações, o Usuário deverá comunicar-se por e-mail, caso não concorde com o Termo de Uso alterado. Nesse caso, o vínculo contratual deixará de existir, desde que não haja contas ou dívidas em aberto em nome do Usuário. Não havendo manifestação no prazo estipulado, entender-se-á que o USUÁRIO aceitou tacitamente as modificações realizadas.</p><p>8.3 As alterações não vigorarão em relação a ofertas, compromissos e aquisições já iniciados ao tempo em que as mesmas alterações sejam publicadas. Para estes, o Termo valerá com a redação anterior.</p><p><b>9. PRIVACIDADE DA INFORMAÇÃO</b></p><p>9.1 O PortalUrbano tomará todas as medidas possíveis para manter a confidencialidade e a segurança descritas nesta cláusula, porém não responderá por prejuízo que possa ser derivado da violação dessas medidas por parte de terceiros que utilizem as redes públicas ou a internet, subvertendo os sistemas de segurança para acessar as informações de Usuários.</p><p>9.2 Em caso de dúvidas sobre a proteção a dados pessoais, ou para obter maiores informações sobre dados pessoais e os casos nos quais poderá ser \r\nquebrado o sigilo de que trata esta cláusula, consultar faleconosco@portalurbano.com.br.</p><p><b>10. VIOLAÇÃO NO SISTEMA OU BASE DE DADOS</b></p><p>10.1 Não é permitida a utilização de nenhum dispositivo, software, ou outro recurso que venha a interferir nas atividades e operações do PortalUrbano, \r\nbem como nas publicações de Oferta, descrições, contas ou seus bancos de dados. Qualquer intromissão, tentativa de, ou atividade que viole ou contrarie as leis de direito de propriedade intelectual e/ou as proibições estipuladas neste Termo de Uso, tornarão o responsável passível das ações legais pertinentes, bem como das sanções aqui previstas, sendo ainda responsável pelas indenizações por eventuais danos causados.\r\n</p><p><b> \r\n11. SANÇÕES</b></p><p>11.1 Sem prejuízo de outras medidas, o PortalUrbano poderá advertir, suspender ou cancelar, temporária ou definitivamente, a conta de um Usuário a \r\nqualquer tempo, e iniciar as ações legais cabíveis se: a) o Usuário não cumprir qualquer dispositivo deste Termo de Uso; b) se descumprir com seus deveres de Usuário; c) se praticar atos fraudulentos ou dolosos; d) se não puder ser verificada a identidade do Usuário ou qualquer informação fornecida por ele esteja incorreta; e) se o PortalUrbano entender que os anúncios ou qualquer atitude do Usuário tenham causado algum dano a terceiros ou ao próprio PortalUrbano ou tenham a potencialidade de assim o fazer. Nos casos de inabilitação do cadastro do Usuário, todas as Aquisições de Ofertas ativas serão automaticamente canceladas. O PortalUrbano reserva-se o direito de, a qualquer momento e a seu exclusivo critério, solicitar o envio de documentação pessoal.</p><p><b>12. RESPONSABILIDADES</b></p><p>12.1 O PortalUrbano se responsabiliza a disponibilizar ao USUÁRIO login e senha para acesso ao site, desde que este respeite integralmente o disposto \r\nno presente Termo e na legislação vigente.</p><p>12.2 OPortalUrbano tentará manter a qualidade e funcionamento do site 24 (vinte e quatro) horas por dia, 7 (sete) dias na semana, salvo falhas provenientes da conexão utilizada pelo USUÁRIO, manutenção periódica no sistema, bem como casos fortuitos ou de força maior.</p><p>12.3 As partes se comprometem a garantir a segurança e a confidencialidade na utilização do site.</p><p>12.4 O PortalUrbano só responderá pelos atos a que tenha dado causa, não assumindo qualquer responsabilidade quanto à frustração de expectativas de ganhos ou lucros cessantes que venham a incorrer o USUÁRIO.\r\n</p><p>12.5 OPortalUrbano não terá qualquer responsabilidade quanto à forma de utilização dos serviços pelo USUÁRIO, devendo este responder integralmente pelos seus atos.</p><p>12.6 O PortalUrbano não se responsabilizará por qualquer impossibilidade técnica que não lhe seja imputada.<br></p><p>12.7 O PortalUrbano se responsabiliza, exclusivamente, pela disponibilização das ofertas em seu sistema, intermediando o negócio entre os USUÁRIOS e as empresas PARCEIRAS.</p><p>12.8 O PortalUrbano não é proprietária ou possuidora dos bens e/ou serviços ofertados, sendo esses de inteira responsabilidade das empresas PARCEIRAS, inclusive quanto à qualidade e quantidade dos mesmos.</p><p>12.9 O PortalUrbano não terá qualquer responsabilidade quanto à entrega dos bens e/ou serviços aos USUÁRIOS adquirentes. Sendo que qualquer\r\nproblema, deverá ser comunicado ao site para que a Empresa Parceira seja comunicada.</p><p>12.10 O PortalUrbano não se responsabiliza, na ocasião de sua entrega e/ou uso, pela existência, quantidade, qualidade, estado, integridade ou legitimidade dos produtos ofertados pelos Parceiros e adquiridos pelos Usuários, assim como pela capacidade para contratar dos Usuários ou pela veracidade dos dados pessoais por eles inseridos em seus cadastros. Não outorga garantia por vícios ocultos ou aparentes nas negociações entre os Usuários.</p><p>12.11 O PortalUrbano não será responsável pelo efetivo cumprimento das obrigações assumidas pelos Usuários. O Usuário reconhece e aceita que ao adquirir produtos e/ou serviços dos Parceiros o faz por sua conta e risco. Em nenhum caso o PortalUrbano será responsável pelo lucro cessante ou por qualquer outro dano e/ou prejuízo que o Usuário possa sofrer devido às aquisições realizadas através do website.</p><p>12.12 O PortalUrbano não se responsabiliza pela perda, roubo, danificação ou extravio do cupom numerado para identificação da Aquisição da Oferta, após a realização da distribuição eletrônica ao Usuário. O número inscrito no cupom será o elemento identificador da Aquisição da Oferta perante o Parceiro sendo a manutenção de sua segurança, e sua divulgação a terceiros, de exclusiva responsabilidade do Usuário adquirente.</p><p>12.13 O PortalUrbano recomenda que toda transação seja realizada com cautela e bom senso. O Usuário deverá sopesar os riscos da Aquisição da Oferta.\r\n \r\n</p><p><b>13. DA CONFIDENCIALIDADE\r\n</b></p><p>13.1 As partes se comprometem a manter com reserva e confidencialidade quaisquer informações às quais venham a ter acesso no âmbito deste Termo, não as utilizando exceto em benefício dos serviços aqui pactuados, nem tampouco as publicando, revelando-as ou divulgando-as, exceto aquelas autorizadas, por escrito, pelos seus proprietários, ou, ainda, legalmente e/ou judicialmente exigidas.\r\n</p><p><b> \r\n14. DA VIGÊNCIA E DA RESCISÃO</b></p><p>14.1 O presente Termo terá início a partir da disponibilização do login e senha ao USUÁRIO pelo PortalUrbano, e vigerá por prazo indeterminado.</p><p>14.2 O presente Termo será rescindido de pleno direito, independentemente de aviso ou notificação, podendo o PortalUrbano imediatamente cancelar todos os serviços, conteúdo se produtos objeto do presente, caso o USUÁRIO venha a violar qualquer das suas obrigações pactualmente estipuladas, sem prejuízo de sua responsabilização cível e/ou criminal.</p><p><b>15. ALCANCE DOS SERVIÇOS</b></p><p>15.1 Este Termo de Uso não gera nenhum contrato de sociedade, de mandato, franquia ou relação de trabalho entre o PortalUrbano e o Usuário. O Usuário manifesta ciência de que o PortalUrbano não é parte de nenhuma transação, nem possui controle algum sobre a qualidade e a segurança dos produtos e/ou serviços anunciados.</p><p>15.2 O PortalUrbano não garante a veracidade da publicação de terceiros que apareça em seu site e não será responsável pela correspondência ou contratos que o Usuário realize com terceiros ou mesmo diretamente com seus Parceiros.</p><p>15.3 OPortalUrbano não se responsabiliza por qualquer dano, prejuízo ou perda no equipamento do Usuário causado por falhas no sistema, no servidor ou na internet decorrentes de condutas de terceiros. O PortalUrbano também não será responsável por qualquer vírus que possa atacar o equipamento do Usuário em decorrência do acesso, utilização ou navegação no site na internet; ou como consequência da transferência de dados, arquivos, imagens, textos ou áudio.</p><p>15.4 Os Usuários não poderão atribuir ao PortalUrbano nenhuma responsabilidade nem exigir o pagamento por lucro cessante em virtude de prejuízos resultantes de dificuldades técnicas ou falhas nos sistemas ou na internet. Eventualmente, o sistema poderá não estar disponível por motivos técnicos ou falhas da internet, ou por qualquer outro evento fortuito ou de força maior alheio ao controle do PortalUrbano.</p><p><b>16. PROPRIEDADE INTELECTUAL</b></p><p>16.1 O uso comercial da expressão expressão \"PortalUrbano\" ou \"PortalUrbano.com.br\" ou \"PortalUrbano Compras Coletivas\" como marca, nome empresarial ou nome de domínio, bem como os conteúdos das telas relativas aos serviços constantes no site, bem como os programas, bancos de dados, redes e arquivos, que permitem que o USUÁRIO acesse e use sua conta, são propriedade do Baita Oferta e estão protegidos pelas leis e tratados internacionais de direito autoral, marcas, patentes, modelos e desenhos industriais. O uso indevido e a reprodução total ou parcial dos referidos conteúdos são proibidos, salvo autorização expressa do PortalUrbano, sujeitando o infrator a responsabilização civil e criminal.</p><p>16.2 O site pode linkar outros endereços eletrônicos da rede o que não significa que esses endereços sejam de propriedade ou operados pelo PortalUrbano. Não possuindo controle sobre esses endereços eletrônicos, o PortalUrbano não será responsável pelos conteúdos, práticas e serviços ofertados nos mesmos. A presença de links para outros endereços eletrônicos não implica relação de sociedade, de supervisão, de cumplicidade ou solidariedade do PortalUrbano para com esses endereços, seus conteúdos e/ou responsáveis.</p><p>16.3 Fica expressamente proibida a reprodução total ou parcial do site, mesmo que seja por link, ou do seu conteúdo, mesmo que parcialmente, sem a permissão expressa do PortalUrbano.</p><p><b>17. INDENIZAÇÃO</b></p><p>17.1 O Usuário indenizará o PortalUrbano, suas filiais, empresas controladas ou controladoras, diretores, administradores, colaboradores, representantes e empregados por qualquer demanda promovida por outros usuários ou terceiros decorrentes de suas atividades no site ou por seu descumprimento dos Termos de Uso ou pela violação de qualquer lei ou direitos de terceiros, incluindo honorários de advogados.</p><p><b>18. FORO E LEGISLAÇÃO APLICÁVEL</b></p><p>18.1 Para dirimirem-se dúvidas ou controvérsias oriundas do presente Termo, as partes elegem o foro da Comarca de Divinópolis, Estado de Minas Gerais.\r\n \r\n</p><p><b>19. DAS DISPOSIÇÕES GERAIS</b></p><p>19.1 A tolerância ou o não exercício por qualquer das partes de direitos a eles assegurados neste Termo ou na lei em geral não importará em renúncia a esses direitos ou novação de obrigações.</p><p>19.2 Toda e qualquer alteração na sistemática ou rotina dos serviços, que enseje na alteração deste Termo, será processada pelo PortalUrbano.</p><p>19.3 O USUÁRIO expressamente aceita que o PortalUrbano e/ou qualquer de suas empresas PARCEIRAS o enviem mensagens de e-mail e/ou de SMS e /ou WHATSAPP, bem como qualquer recurso de comunicação disponível.</p><p>19.4 As modificações entrarão em vigor 48 (quarenta e oito) horas a partir de sua publicação no site. O USUÁRIO, em igual prazo, caso não concorde com as modificações realizadas, deverá entrar em contato, via e-mail, com o PortalUrbano e solicitar o cancelamento da sua conta, e, consequentemente, a extinção do vínculo. Nesse caso, o vínculo contratual deixará de existir, desde que não haja contas ou dívidas em aberto em nome do USUÁRIO.</p>', '', '', '', '', 1),
(5, 'eventos', '<p>pagina eventos</p><p><br></p>', '', '', '', '', 1),
(6, 'servicos', '<p>pagina servicos</p>', '', '', '', '', 1),
(7, 'turismo', '<p>pagina turismo</p>', '', '', '', '', 1),
(8, 'classificados', '<p>pagina classificados</p>', '', '', '', '', 1),
(9, 'lomadee', '<!-- Vitrine Inteligente Lomadee -->\r\n<div class=\"g3S6Z4x927jE\" style=\"width: 300px; height: 250px\">\r\n<script type=\"text/javascript\" class=\"lomadee-recommender-script\" src=\"//ad.lomadee.com/v1/eyJwdWJsaXNoZXJJZCI6MjI2ODk3NTMsInNpdGVJZCI6MzM4MTA2MzEsInNvdXJjZUlkIjozNTk2NDI1M30%3D.js?w=300&amp;h=250\"></script>\r\n</div><!-- Vitrine Inteligente Lomadee -->', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(99) NOT NULL,
  `produtos` int(11) NOT NULL,
  `empresas` int(99) NOT NULL,
  `id_compra` int(99) NOT NULL,
  `id_usuario` int(99) NOT NULL,
  `valor_pago` varchar(255) NOT NULL,
  `data_pedido` varchar(255) NOT NULL,
  `data_validade` text NOT NULL,
  `data_validado` varchar(255) NOT NULL,
  `link_payment` text NOT NULL,
  `tipo_pedido` int(11) NOT NULL,
  `tipo_compra` int(11) NOT NULL,
  `pago` int(11) NOT NULL,
  `utilizado` int(11) NOT NULL,
  `status_do_pedido` int(11) NOT NULL,
  `code_gerado` text NOT NULL,
  `referencecode` text NOT NULL,
  `status` int(11) NOT NULL,
  `usuarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `produtos`, `empresas`, `id_compra`, `id_usuario`, `valor_pago`, `data_pedido`, `data_validade`, `data_validado`, `link_payment`, `tipo_pedido`, `tipo_compra`, `pago`, `utilizado`, `status_do_pedido`, `code_gerado`, `referencecode`, `status`, `usuarios`) VALUES
(1, 47, 33, 47, 2, '100.00', '01/12/2020', '12/31/2022', '01/12/2020', '', 0, 1, 0, 1, 0, 'FNm9ddTSmN', '', 1, 2),
(2, 47, 33, 47, 2, '100.00', '01/12/2020', '12/31/2022', '01/12/2020', '', 0, 1, 0, 1, 0, 'RdOF68Sqnv', '', 1, 2),
(3, 45, 32, 45, 1, '100.00', '01/12/2020', '12/31/2022', '01/12/2020', '', 0, 1, 0, 1, 0, '3xMObSf3Z3', '', 1, 1),
(4, 47, 33, 47, 4, '100.00', '12/03/2021', '12/31/2022', '13/03/2021', '', 0, 1, 0, 1, 0, 'G23f8EEBzY', '', 1, 4),
(5, 45, 32, 45, 4, '100.00', '12/03/2021', '12/31/2022', '13/03/2021', '', 0, 1, 0, 1, 0, 'GPUICiXBH7', '', 1, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(99) NOT NULL,
  `promobanner` text NOT NULL,
  `destaque` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `CONTAINER` int(11) NOT NULL,
  `empresas` int(11) NOT NULL,
  `quantidade` int(99) NOT NULL,
  `breve_descricao` text NOT NULL,
  `descricao` text NOT NULL,
  `regras_de_uso` text NOT NULL,
  `opcao2` text NOT NULL,
  `valor2` text NOT NULL,
  `opcao` text NOT NULL,
  `valor` varchar(255) NOT NULL,
  `tipoProd` int(11) NOT NULL,
  `desconto` varchar(255) NOT NULL,
  `desconto2` varchar(255) NOT NULL,
  `categorias` int(99) NOT NULL,
  `localidade` int(99) NOT NULL,
  `valido` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `image2` text NOT NULL,
  `image3` text NOT NULL,
  `image4` text NOT NULL,
  `image5` text NOT NULL,
  `image6` text NOT NULL,
  `image7` text NOT NULL,
  `image8` text NOT NULL,
  `selo` int(11) NOT NULL,
  `cronometro` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `promobanner`, `destaque`, `nome`, `CONTAINER`, `empresas`, `quantidade`, `breve_descricao`, `descricao`, `regras_de_uso`, `opcao2`, `valor2`, `opcao`, `valor`, `tipoProd`, `desconto`, `desconto2`, `categorias`, `localidade`, `valido`, `image`, `image2`, `image3`, `image4`, `image5`, `image6`, `image7`, `image8`, `selo`, `cronometro`, `status`) VALUES
(45, '', 1, 'Exemplo 1 - Demonstrativo Agência CodeLabs em Minas Gerais', 7, 32, 1000, 'Exemplo 1 - Demonstrativo Agência CodeLabs em Minas Gerais', '<p><span style=\"color: rgb(114, 111, 111); font-family: Poppins, sans-serif; font-size: 16px;\">O Sistema de Cupom Descontos é um site de anúncios voltado para anúncio de empresas e serviços de descontos. Altamente lucrativo e de fácil administração é um sistema totalmente desenvolvido pela Agência CodeLabs. Se você ou sua empresa presta serviços de qualidade e está precisando divulgar empresas e descontos, este é o sistema.</span><br></p>', '<p><span style=\"color: rgb(114, 111, 111); font-family: Poppins, sans-serif; font-size: 16px;\">O Sistema de Cupom Descontos é um site de anúncios voltado para anúncio de empresas e serviços de descontos. Altamente lucrativo e de fácil administração é um sistema totalmente desenvolvido pela Agência CodeLabs. Se você ou sua empresa presta serviços de qualidade e está precisando divulgar empresas e descontos, este é o sistema.</span><br></p>', '', '', 'Agência CodeLabs', '100.00', 0, '10.00', '', 16, 1, '12/31/2022', '18112020_740164554banner.png', '', '', '', '', '', '', '', 0, 1, 1),
(46, '', 1, 'Exemplo 2 - Demonstrativo Agência CodeLabs em Minas Gerais', 3, 32, 1000, 'Exemplo 2 - Demonstrativo Agência CodeLabs', '<p><span style=\"color: rgb(114, 111, 111); font-family: Poppins, sans-serif; font-size: 16px;\">O Sistema de Cupom Descontos é um site de anúncios voltado para anúncio de empresas e serviços de descontos. Altamente lucrativo e de fácil administração é um sistema totalmente desenvolvido pela Agência CodeLabs. Se você ou sua empresa presta serviços de qualidade e está precisando divulgar empresas e descontos, este é o sistema.</span><br></p>', '<p><span style=\"color: rgb(114, 111, 111); font-family: Poppins, sans-serif; font-size: 16px;\">O Sistema de Cupom Descontos é um site de anúncios voltado para anúncio de empresas e serviços de descontos. Altamente lucrativo e de fácil administração é um sistema totalmente desenvolvido pela Agência CodeLabs. Se você ou sua empresa presta serviços de qualidade e está precisando divulgar empresas e descontos, este é o sistema.</span><br></p>', 'Sub 2 Exemplo 2 - Demonstrativo Agência CodeLabs', '150.00', 'Sub 1 Exemplo 2 - Demonstrativo Agência CodeLabs', '100.00', 1, '10.00', '15.00', 2, 1, '31/12/2021', '18112020_1482439626banner.png', '', '', '', '', '', '', '', 0, 1, 1),
(47, '', 1, 'Exemplo 1 - Demonstrativo Agência CodeLabs em São Paulo', 7, 33, 100, 'Exemplo 1 - Demonstrativo Agência CodeLabs em São Paulo', '<p><span style=\"color: rgb(114, 111, 111); font-family: Poppins, sans-serif; font-size: 16px;\">O Sistema de Cupom Descontos é um site de anúncios voltado para anúncio de empresas e serviços de descontos. Altamente lucrativo e de fácil administração é um sistema totalmente desenvolvido pela Agência CodeLabs. Se você ou sua empresa presta serviços de qualidade e está precisando divulgar empresas e descontos, este é o sistema.</span><br></p>', '<p><span style=\"color: rgb(114, 111, 111); font-family: Poppins, sans-serif; font-size: 16px;\">O Sistema de Cupom Descontos é um site de anúncios voltado para anúncio de empresas e serviços de descontos. Altamente lucrativo e de fácil administração é um sistema totalmente desenvolvido pela Agência CodeLabs. Se você ou sua empresa presta serviços de qualidade e está precisando divulgar empresas e descontos, este é o sistema.</span><br></p>', '', '', 'Agência CodeLabs', '100.00', 0, '10.00', '', 15, 4, '12/31/2022', '18112020_389549667banner.png', '', '', '', '', '', '', '', 0, 1, 1),
(48, '', 1, 'Exemplo 2 - Demonstrativo Agência CodeLabs em São Paulo', 3, 33, 1000, 'Exemplo 2 - Demonstrativo Agência CodeLabs em São Paulo', '<p><span style=\"color: rgb(114, 111, 111); font-family: Poppins, sans-serif; font-size: 16px;\">O Sistema de Cupom Descontos é um site de anúncios voltado para anúncio de empresas e serviços de descontos. Altamente lucrativo e de fácil administração é um sistema totalmente desenvolvido pela Agência CodeLabs. Se você ou sua empresa presta serviços de qualidade e está precisando divulgar empresas e descontos, este é o sistema.</span><br></p>', '<p><span style=\"color: rgb(114, 111, 111); font-family: Poppins, sans-serif; font-size: 16px;\">O Sistema de Cupom Descontos é um site de anúncios voltado para anúncio de empresas e serviços de descontos. Altamente lucrativo e de fácil administração é um sistema totalmente desenvolvido pela Agência CodeLabs. Se você ou sua empresa presta serviços de qualidade e está precisando divulgar empresas e descontos, este é o sistema.</span><br></p>', '', '', 'Sub 1 Exemplo 2 - Demonstrativo Agência CodeLabs', '100.00', 1, '10.00', '', 2, 4, '12/31/2022', '18112020_445148344banner.png', '', '', '', '', '', '', '', 0, 1, 1),
(51, '', 0, 'este', 8, 32, 56, 'efe', '<p>dfdfdf</p>', '<p>fgfdg</p>', '5', '', 'fgdfg', '5.65', 0, '6.56', '', 17, 1, '06/30/2022', '26062022_595324586WhatsApp Image 2022-06-21 at 10.30.20.jpeg', '', '', '', '', '', '', '', 0, 0, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `recupera_senha`
--

CREATE TABLE `recupera_senha` (
  `id` int(99) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` text NOT NULL,
  `data` varchar(255) NOT NULL,
  `validade` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `recupera_senha`
--

INSERT INTO `recupera_senha` (`id`, `email`, `token`, `data`, `validade`, `status`) VALUES
(27, 'contato@portalurbano.com.br', '104204', '10/04/2018 22:06:42', '11/04/2018 22:06:42', 1),
(28, 'contato@portalurbano.com.br', '105704', '10/04/2018 22:07:57', '11/04/2018 22:07:57', 1),
(29, 'contato@portalurbano.com.br', '105104', '10/04/2018 23:11:51', '11/04/2018 23:11:51', 1),
(37, 'contato@portalurbano.com.br', '112904', '11/04/2018 05:32:29', '12/04/2018 05:32:29', 1),
(38, 'contato@portalurbano.com.br', '112704', '11/04/2018 22:44:27', '12/04/2018 22:44:27', 1),
(39, 'contato@portalurbano.com.br', '111704', '11/04/2018 22:47:17', '12/04/2018 22:47:17', 1),
(40, 'contato@portalurbano.com.br', '113404', '11/04/2018 23:31:34', '12/04/2018 23:31:34', 1),
(41, 'contato@portalurbano.com.br', '115704', '11/04/2018 23:31:57', '12/04/2018 23:31:57', 1),
(43, 'horielgarcia@gmail.com', '145504', '14/04/2018 13:27:55', '15/04/2018 13:27:55', 1),
(44, 'contato@portalurbano.com.br', '145304', '14/04/2018 13:28:53', '15/04/2018 13:28:53', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(99) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `cep` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `fb_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `pass`, `image`, `cpf`, `cidade`, `estado`, `endereco`, `cep`, `telefone`, `status`, `fb_id`) VALUES
(1, 'Agência CodeLabs', 'atendimento@agenciacodelabs.com.br', '0192023a7bbd73250516f069df18b500', '', '017.427.820-94', 'Belo Horizonte', 'MG', 'Av. Afonso Pena, 1212 - Centro, Belo Horizonte', '30130-003', '00000000000', 1, ''),
(2, 'João Oliveira', 'joaooliversystem@gmail.com', '05db264bba64c47a693cdbf91206bbed', '', '10754748685', 'Carangola', 'MG', 'Rua Centro', '3680000', '00000000000', 0, ''),
(3, 'Ruan Morais', 'ruangbm01@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '', '044.332.602-90', 'Avenida Governador Fernando Guilhon', 'PA', 'Avenida Governador Fernando Guilhon', '68180-110', '93991002305', 0, ''),
(4, 'Rony', 'ronymanganaro@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '', '', '', '', 0, ''),
(5, 'George', 'recoverjp@gmail.com', 'ed3b3f62b60e88c5b9654688cbfe758d', '', '', '', '', '', '', '', 0, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `validados`
--

CREATE TABLE `validados` (
  `id` int(99) NOT NULL,
  `empresas` int(99) NOT NULL,
  `pedidos` int(99) NOT NULL,
  `data` varchar(255) NOT NULL,
  `ip` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `validados`
--

INSERT INTO `validados` (`id`, `empresas`, `pedidos`, `data`, `ip`, `status`) VALUES
(1, 0, 0, '01/12/2020', '186.193.25.50', 1),
(2, 0, 0, '01/12/2020', '186.193.25.50', 1),
(3, 0, 0, '01/12/2020', '186.193.25.50', 1),
(4, 0, 0, '13/03/2021', '168.228.94.245', 1),
(5, 0, 0, '13/03/2021', '168.228.94.245', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `administracao`
--
ALTER TABLE `administracao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `colunasofertas`
--
ALTER TABLE `colunasofertas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Índices para tabela `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `LICENCE_KEY` (`id`);

--
-- Índices para tabela `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `localidade`
--
ALTER TABLE `localidade`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `menu_admin`
--
ALTER TABLE `menu_admin`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `menu_admin_categorias`
--
ALTER TABLE `menu_admin_categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `paginas`
--
ALTER TABLE `paginas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `recupera_senha`
--
ALTER TABLE `recupera_senha`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `validados`
--
ALTER TABLE `validados`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administracao`
--
ALTER TABLE `administracao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `colunasofertas`
--
ALTER TABLE `colunasofertas`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `config`
--
ALTER TABLE `config`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `localidade`
--
ALTER TABLE `localidade`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `menu_admin`
--
ALTER TABLE `menu_admin`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `menu_admin_categorias`
--
ALTER TABLE `menu_admin_categorias`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `paginas`
--
ALTER TABLE `paginas`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de tabela `recupera_senha`
--
ALTER TABLE `recupera_senha`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `validados`
--
ALTER TABLE `validados`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
