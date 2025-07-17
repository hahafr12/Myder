from setuptools import setup

setup(
    name='kaliman',
    version='1.0.0',
    description='Kurulu Kali Linux ortamını başlatan küçük bir Termux aracı',
    author='hahafr12',
    author_email='muhammetcanaltan39@gmail.com',
    packages=['kaliman-launcher'],
    entry_points={
        'console_scripts': [
            'kaliman = kaliman-launcher.__main__:main'
        ]
    },
)
