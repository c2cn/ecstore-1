# ecstore
ecstore一些常用的例子和模板方法
# ecstore常用的数据库操作方法
1. save方法：有主键的时候会去更新该条数据，没有主见的话更新数据。当然也可后边跟第二和第三个参数进行多表关联查询。
2. insert:增加一条数据并返回新增的id
3. getList:查询多条数据，参数为array('查询内容'，条件，开始值，页数，排序)
4. getRow:查询一条数据，其实也就是getlist的第一个返回值。参数为array('查询内容'，条件，排序)
5. update:更新一条数据，两个参数update(array(需要更新的内容)，array(需要更新的数据id等信息))
6. delete:删除一条数据
7. count:返回要查询数据的总数
8. dump：很复杂的一个参数，功能类似于getRow，但是可以根据系统得has_many，has_one进行关联查询
# ecstore smarty一些常见的用法
1. 打印变量 <{$dete|@print_r}> 
2. 计数 <{$dete|@ count}> 
3. 日期 <{$dete.time|date_format:"%Y.%m.%d"}>
4. 截取字符串 <{$dete.name|mb_substr:0:10:'utf8'}>
# ecstore 内置前端标签用法
1. 图片标签  
<{input type='image'  name='pic' value=$setting.spic}>
2. 颜色标签  
 <{input type="color" value=$setting.color|default:'#333333' name="color"}>
3. 商品分类标签  
 <{input type="category" value="{$goods.category.cat_id}" name="goods[category][cat_id]"}>
4. 替代原有select标签  
<{input type="select" name="goods[store_prompt]" options=$store_prompt value=$goods.store_prompt}>
5. 替代原有redio标签    
<{input type='radio' name="switch[discuss]" options=$setting.aSwitch.discuss value=$setting.discuss}>、
6. 显示商品或者会员等对象列表标签  
<{input type="object" object="members" name="order[member_id]" }>
7. 单选框显示布尔类型标签  
<{input type="bool" name='name' value="ture" id="bool"}>
8. 系统内置前端显示时间选择器  
<{input type="date" value="date"}>
9. input_region地区三级联动  
<{input app=ectools type="region" name='region' vtype='area'}>
10. 具体参数作用可以参照：app/desktop/lib/view/input.php
