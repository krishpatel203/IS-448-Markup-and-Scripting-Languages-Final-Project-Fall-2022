<?php
include 'member.php';
?>
<HTML>
    <Title>Add Category </Title>
    <Center>
        <H1>
            Insert New Category Data        ---     <A Href=page1.php>Home </A>
        </H1>
        <Form action=insertcat.php method=post>
            <Table border=0>
                <Tr>
                    <Td>
                        <H3>Name 
                    </Td>
                    <Td>
                        <Input type=text name=cn>
                        <Br>
                    </Td>
                <Tr>
                    <Td></Td>
                    <Td>
                        <Table border=0 width=70%>
                            <Tr>
                                <Td valign=top>
                                    <Input type=submit value=Update>
        </Form>
</Td>
<Td valign=top>
    <form action=displaycat.php>
        <Input type=submit value=Cancel>
    </form>
</Td>
</Tr></Table></Td></Tr></Table></Center></HTML>
