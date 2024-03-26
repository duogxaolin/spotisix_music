import 'package:flutter/material.dart';
import 'package:webview_flutter/webview_flutter.dart';

void main() {
  runApp(MaterialApp(
    title: 'Webview Example',
    home: WebViewExample(),
  ));
}

class WebViewExample extends StatefulWidget {
  @override
  _WebViewExampleState createState() => _WebViewExampleState();
}

class _WebViewExampleState extends State<WebViewExample> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Spotisix Music'),
      ),
      body: WebView(
        initialUrl: 'https://music.duogxaolin.com',
        javascriptMode: JavascriptMode.unrestricted,
      ),
    );
  }
}
