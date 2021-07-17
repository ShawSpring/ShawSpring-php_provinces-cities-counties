## php 小demo之 省市县三级联动

#### 用到了 php mysql jquery ajax

## 踩坑点记录
1. $().change() 需要在DOM生成之后才有效， 要么写在 $().ready()里，要么写在文档后边
2. $("#city").trigger('change')   触发 #city 的 change事件
3. js是驼峰风格， $.ajax({   dataType: }) 这里 "T"是大写， 返回是json对象，默认就是文本字符串类型，需要JSON.parse(data)
4. 注意将配置单独写在一个配置文件里，.gitignore中排除

